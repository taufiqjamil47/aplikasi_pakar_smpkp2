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
        // \App\Models\User::factory(5)->create();
        $this->call(
            ClassRoomSeeder::class,
            StudentSeeder::class
        );

        \App\Models\User::create(
            [
                'name' => 'Taufiq Jamil Hanafi',
                'email' => 'taufiqjamil47@pakar.school.id',
                'password' => Hash::make('123456'),
                'role' => '1'
            ],
        );
        \App\Models\User::create(
            [
                'name' => 'Muhammad Azizan',
                'email' => 'azizan22@pakar.school.id',
                'password' => Hash::make('123456'),
                'role' => '1'
            ],
        );
        \App\Models\User::create(
            [
                'name' => 'Candra Pardiana',
                'email' => 'pardiana@pakar.school.id',
                'password' => Hash::make('123456'),
                'role' => '1'
            ],
        );
    }
}
