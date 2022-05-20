<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $table = 'finances';
    protected $guarded = ['id'];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'id_cabang');
    }
}


