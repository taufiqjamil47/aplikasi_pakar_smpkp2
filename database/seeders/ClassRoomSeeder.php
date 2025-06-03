<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\ClassRoom::create(
            [
                'nama_kelas' => 'Kelas 7A',
            ],
        );
        \App\Models\ClassRoom::create(
            [
                'nama_kelas' => 'Kelas 7B',
            ],
        );
        \App\Models\ClassRoom::create(
            [
                'nama_kelas' => 'Kelas 7C',
            ],
        );
    }
}
