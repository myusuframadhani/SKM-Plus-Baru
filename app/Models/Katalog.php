<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;

    protected $guarded = ['id_produk'];
    //tambahkan kode berikut
    protected $fillable = [
        'nama_produk', 'harga_produk', 'gambar', 'deskripsi_produk'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
