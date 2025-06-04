<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsensiSignature extends Model
{
    protected $fillable = ['nama_petugas', 'tanggal', 'signed_at', 'signature_path'];
}
