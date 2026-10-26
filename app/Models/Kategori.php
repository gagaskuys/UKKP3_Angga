<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public const OPTIONS = [
        'Pelayanan Publik',
        'Infrastruktur',
        'Kebersihan dan Lingkungan',
        'Keamanan dan Ketertiban',
        'Fasilitas Umum',
        'Lainnya',
    ];

    protected $table = 'kategori';
    protected $fillable = ['nama_kategori', 'deskripsi'];
}