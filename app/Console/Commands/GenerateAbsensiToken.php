<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use App\Models\AbsensiToken;
use Illuminate\Console\Command;
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
        $tanggal = now()->toDateString();

        if (AbsensiToken::where('tanggal', $tanggal)->exists()) {
            $this->info("Token sudah dibuat hari ini.");
            return;
        }

        $token = 'smpkp2' . Str::random(8);

        AbsensiToken::create([
            'token' => $token,
            'tanggal' => $tanggal,
            'expired_at' => now()->setTime(14, 0),
        ]);

        // Kirim via WhatsApp (contoh: Fonnte)
        Http::withHeaders([
            'Authorization' => 'frKW7rLNoejGVCvcTdQb',
        ])->post('https://api.fonnte.com/send', [
            'target' => '082218247031',
            'message' => "Token Absensi Hari Ini:\n$token\n\nSilakan klik link berikut, untuk input token :\nhttps://appsmpkp2.test/absensi/form?token=$token"
        ]);

        $this->info("Token berhasil dibuat dan dikirim.");
    }
}
