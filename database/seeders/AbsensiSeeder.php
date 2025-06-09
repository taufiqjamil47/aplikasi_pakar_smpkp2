<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $statuses = ['Hadir', 'Izin', 'Sakit', 'Alfa'];
        $students = range(1, 10); // ID siswa dari 1 sampai 10
        $startDate = Carbon::create(2025, 6, 9); // Mulai dari 2 Juni 2025
        $endDate = Carbon::create(2025, 6, 13);   // Sampai 6 Juni 2025

        $data = [];

        foreach ($students as $student_id) {
            $tanggal = $startDate->copy();
            while ($tanggal <= $endDate) {
                $data[] = [
                    'student_id' => $student_id,
                    'tanggal' => $tanggal->toDateString(),
                    'status' => $statuses[array_rand($statuses)],
                    'keterangan' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                $tanggal->addDay();
            }
        }

        DB::table('absensis')->insert($data);
    }
}
