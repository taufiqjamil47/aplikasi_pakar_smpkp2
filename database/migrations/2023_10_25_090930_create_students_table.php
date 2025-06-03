<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            // Step 1 Data Siswa
            $table->id();
            $table->string('nama_siswa', 70);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->text('nisn');
            $table->text('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('agama', ['Islam', 'Kristen Protestan', 'Katholik', 'Hindu', 'Lainnya']);
            $table->string('alamat');
            $table->integer('rt');
            $table->integer('rw');
            $table->string('desa');
            $table->string('kecamatan');

            // Step 2 Data Siswa lain - lain
            $table->text('no_telp')->nullable();
            $table->string('asal_sekolah');
            $table->string('pkh')->nullable();
            $table->string('kks')->nullable();
            $table->string('pip')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->enum('ukuran_baju', ['S', 'M', 'L', 'XL', 'XXL'])->nullable();

            // Step 3 Orang Tua / Wali
            $table->string('nama_ayah', 70);
            $table->string('tahun_lahir_ayah')->nullable();
            $table->enum('pekerjaan_ayah', ['Tidak Bekerja', 'Nelayan', 'Petani', 'Peternak', 'PNS/TNI/POLRI', 'Karyawan Swasta', 'Pedagang Kecil', 'Pedagang Besar', 'Wiraswasta', 'Wirausaha', 'Buruh', 'Pensiunan', 'Lainnya'])->nullable();
            $table->enum('pendidikan_ayah', ['Tidak Sekolah', 'Putus SD', 'SD Sederajat', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3'])->nullable();
            $table->string('nama_ibu', 70);
            $table->string('tahun_lahir_ibu')->nullable();
            $table->enum('pekerjaan_ibu', ['Tidak Bekerja', 'Nelayan', 'Petani', 'Peternak', 'PNS/TNI/POLRI', 'Karyawan Swasta', 'Pedagang Kecil', 'Pedagang Besar', 'Wiraswasta', 'Wirausaha', 'Buruh', 'Pensiunan', 'Lainnya'])->nullable();
            $table->enum('pendidikan_ibu', ['Tidak Sekolah', 'Putus SD', 'SD Sederajat', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3'])->nullable();
            $table->string('nama_wali', 70)->nullable();
            $table->string('tahun_lahir_wali')->nullable();
            $table->enum('pekerjaan_wali', ['Tidak Bekerja', 'Nelayan', 'Petani', 'Peternak', 'PNS/TNI/POLRI', 'Karyawan Swasta', 'Pedagang Kecil', 'Pedagang Besar', 'Wiraswasta', 'Wirausaha', 'Buruh', 'Pensiunan', 'Lainnya'])->nullable();
            $table->enum('pendidikan_wali', ['Tidak Sekolah', 'Putus SD', 'SD Sederajat', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4/S1', 'S2', 'S3'])->nullable();
            $table->string('slug')->unique(); // Slug data friendly
            $table->string('periode')->nullable(); // periode data 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
