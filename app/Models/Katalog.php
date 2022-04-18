<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;

    protected $table = 'katalogs';

    protected $guarded = ['id'];

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
