<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Katalog;
   
class CreateKatalogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $katalog = [
            [
               'nama_produk'=>'Susu Coklat',
               'harga_produk'=>'3000',
               'gambar' => '',
                'deskripsi_produk'=>'enak',
            ],
            [
               'nama_produk'=>'Susu Original',
               'harga_produk'=>'3000',
               'gambar' => '',
                'deskripsi_produk'=>'mantap',
            ],
        ];
  
        foreach ($katalog as $key => $value) {
            Katalog::create($value);
        }
    }
}