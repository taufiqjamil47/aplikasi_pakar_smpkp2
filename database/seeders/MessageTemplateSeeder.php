<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessageTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('message_templates')->insert([
            [
                'nama' => 'absensi_token',
                'deskripsi' => 'Template pesan untuk pengiriman token absensi',
                'template' => 'Assalamualaikum Wr Wb*{nama_petugas}* 👋\n\nToken Absensi Hari Ini:\n*{token}*\n\nSilakan klik link berikut untuk input token:\n{link}\n\n⏳ Berlaku sampai jam 14.00 WIB.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
