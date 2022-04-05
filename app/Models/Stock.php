<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }

    public function katalog()
    {
        return $this->belongsTo(Katalog::class);
    }

}
