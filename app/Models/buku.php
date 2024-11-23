<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    protected $fillable = ['kategori_id', 'judul', 'deskripsi', 'penulis', 'cover', 'status'];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id_kategori');
    }
}
