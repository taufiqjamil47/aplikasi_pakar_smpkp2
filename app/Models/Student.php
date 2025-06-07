<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
    protected $casts = [
        'nik' => 'string'
    ];

    // Data baru 
    protected $fillable = [
        'nama_siswa',
        'jenis_kelamin',
        'nisn',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat',
        'rt',
        'rw',
        'desa',
        'kecamatan',
        'no_telp',
        'asal_sekolah',
        'pkh',
        'kks',
        'pip',
        'tinggi_badan',
        'berat_badan',
        'anak_ke',
        'classroom_id',
        'ukuran_baju',
        'nama_ayah',
        'tahun_lahir_ayah',
        'pekerjaan_ayah',
        'pendidikan_ayah',
        'nama_ibu',
        'tahun_lahir_ibu',
        'pekerjaan_ibu',
        'pendidikan_ibu',
        'nama_wali',
        'tahun_lahir_wali',
        'pekerjaan_wali',
        'pendidikan_wali',
        'slug',
        'periode',
    ];

    public function setNamaAttribute($value)
    {
        $this->attributes['nama_siswa'] = $value;
        $this->attributes['slug'] = Str::slug($value); // Mengonversi nama menjadi slug
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class);
    }
}
