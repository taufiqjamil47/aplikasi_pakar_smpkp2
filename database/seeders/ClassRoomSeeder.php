<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('class_rooms')->insert([
            [
                'nama_kelas' => 'Kelas 7A',
                'teacher_id' => 1
            ],
            [
                'nama_kelas' => 'Kelas 7B',
                'teacher_id' => 2
            ],
            [
                'nama_kelas' => 'Kelas 7C',
                'teacher_id' => 3
            ],
            [
                'nama_kelas' => 'Kelas 7D',
                'teacher_id' => 4
            ],
            [
                'nama_kelas' => 'Kelas 7E',
                'teacher_id' => 5
            ],
        ]);
    }
}
