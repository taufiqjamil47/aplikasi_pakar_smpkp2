<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = ['student_id', 'tanggal', 'status', 'keterangan'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
