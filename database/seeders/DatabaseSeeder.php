<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Urutan sesuai kebutuhan kamu
        $this->call([
            TeacherClassSeeder::class,
            ClassRoomSeeder::class,
            StudentSeeder::class,
            UserSeeder::class, // Jangan lupa bikin seeder ini dulu
            PetugasPiketSeeder::class,
            MessageTemplateSeeder::class,
            AbsensiSeeder::class
        ]);
    }
}
