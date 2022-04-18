<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function katalog()
    {
        return $this->belongsTo(Katalog::class, 'id_produk');
    }
    
    public function stock()
    {
        return $this->belongsTo(Stock::class, 'id_stok');
    }
}
