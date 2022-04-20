<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;
    protected $table = 'cabangs';

    protected $guarded = ['id'];
    //tambahkan kode berikut
    protected $fillable = [
        'nama_cabang', 'alamat'
    ];

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
