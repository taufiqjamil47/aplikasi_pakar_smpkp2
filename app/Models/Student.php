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
