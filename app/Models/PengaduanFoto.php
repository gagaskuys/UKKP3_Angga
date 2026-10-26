<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengaduanFoto extends Model
{
    protected $table = 'pengaduan_foto';
    protected $fillable = ['path'];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
}