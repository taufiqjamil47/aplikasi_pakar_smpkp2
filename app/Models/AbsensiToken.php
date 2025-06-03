<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsensiToken extends Model
{
    protected $fillable = ['token', 'tanggal', 'expired_at'];
}
