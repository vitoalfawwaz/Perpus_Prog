<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'penulis',
        'deskripsi',
        'penerbit',
        'tanggal_terbit',
        'jumlah',
        'image'
    ];

    public function loans()
    {
        return $this->hasMany(Loans::class);
    }
}
