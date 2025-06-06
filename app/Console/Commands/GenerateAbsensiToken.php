<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use App\Models\AbsensiToken;
use App\Models\PetugasPiket;
use App\Models\MessageTemplate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class GenerateAbsensiToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-absensi-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate token absensi harian dan kirim via WhatsApp';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        date_default_timezone_set('Asia/Jakarta');

        $tanggal = now()->toDateString();
        $hariIni = now()->locale('id')->dayName;

        Log::info("Memulai proses generate token absensi untuk tanggal {$tanggal}");

        if (AbsensiToken::where('tanggal', $tanggal)->exists()) {
            $message = "Token sudah dibuat hari ini.";
            $this->info($message);
            Log::warning($message);
            return;
        }

        $tokenPrefix = config('absensi.token_prefix', 'smpkp2');
        $token = $tokenPrefix . Str::random(8);

        try {
            $absensiToken = AbsensiToken::create([
                'token' => $token,
                'tanggal' => $tanggal,
                'expired_at' => now()->setTime(10, 0),
            ]);

            Log::info("Token berhasil dibuat: {$token}");
            $this->info("Token berhasil dibuat: {$token}");
        } catch (\Exception $e) {
            Log::error("Gagal membuat token: " . $e->getMessage());
            $this->error("Gagal membuat token: " . $e->getMessage());
            return;
        }

        $petugas = PetugasPiket::where('hari_piket', 'LIKE', "%$hariIni%")->get();

        if ($petugas->isEmpty()) {
            $message = "Tidak ada petugas piket hari ini ($hariIni).";
            $this->info($message);
            Log::warning($message);
            return;
        }

        $template = MessageTemplate::where('nama', 'absensi_token')->first();

        if (!$template) {
            $message = "Template pesan tidak ditemukan.";
            $this->error($message);
            Log::error($message);
            return;
        }

        $successCount = 0;
        $baseUrl = config('app.url', 'http://127.0.0.1:8000');

        foreach ($petugas as $p) {
            try {
                $link = "{$baseUrl}/absen-hari-ini/form?token=";

                $pesanLengkap = str_replace(
                    ['{nama_petugas}', '{token}', '{link}'],
                    [$p->nama, $token, $link],
                    $template->template
                );

                // Konversi \n menjadi newline asli
                $pesanLengkap = str_replace("\\n", "\n", $pesanLengkap);

                $response = Http::withHeaders([
                    'Authorization' => 'frKW7rLNoejGVCvcTdQb',
                ])->post('https://api.fonnte.com/send', [
                    'target' => $p->nomor_wa,
                    'message' => $pesanLengkap
                ]);

                if ($response->successful()) {
                    $successCount++;
                    Log::info("Berhasil mengirim token ke {$p->nama} ({$p->nomor_wa})");
                } else {
                    Log::error("Gagal mengirim token ke {$p->nama} ({$p->nomor_wa}): " . $response->body());
                }
            } catch (\Exception $e) {
                Log::error("Exception saat mengirim WA ke {$p->nomor_wa}: " . $e->getMessage());
            }
        }

        $resultMessage = "Token berhasil dikirim ke {$successCount} dari " . $petugas->count() . " petugas piket hari ini.";
        $this->info($resultMessage);
        Log::info($resultMessage);
    }
}
