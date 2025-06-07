<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Taufiq Jamil Hanafi',
                'email' => 'taufiqjamil@pakar.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('smpKPdua2@'),
                'role' => 1
            ],
            [
                'name' => 'Candra Pardiana',
                'email' => 'candrapardiana@pakar.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('smpKPdua2@'),
                'role' => 1
            ],
            [
                'name' => 'Moch Azizan',
                'email' => 'mochazizan@pakar.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('smpKPdua2@'),
                'role' => 1
            ],
            [
                'name' => 'Yernawati',
                'email' => 'yernawati@pakar.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('smpKPdua2@'),
                'role' => 2
            ],
            [
                'name' => 'Risma Amalia',
                'email' => 'rismaamalia@pakar.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('smpKPdua2@'),
                'role' => 2
            ],
            [
                'name' => 'Tiara Azizah',
                'email' => 'tiaraazizah@pakar.ac.id',
                'email_verified_at' => now(),
                'password' => Hash::make('smpKPdua2@'),
                'role' => 2
            ],
        ]);
    }
}
