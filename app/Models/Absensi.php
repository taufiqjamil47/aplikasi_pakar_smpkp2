<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    protected $fillable = ['student_id', 'tanggal', 'status', 'keterangan'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
