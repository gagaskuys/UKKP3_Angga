<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $fillable = ['user_id', 'kategori_id', 'kategori', 'judul', 'keluhan', 'foto_bukti', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function fotoBukti()
    {
        return $this->hasMany(PengaduanFoto::class, 'pengaduan_id');
    }
}