<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->hasMany(Student::class, 'classroom_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
