<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Katalog;
   
class CreateKatalogSeeder extends Seeder
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
               'nama_produk'=>'Susu Original',
               'harga_produk'=>'3000',
               'deskripsi_produk'=>'Susu Mantap',
            ],
            [
               'nama_produk'=>'Susu Coklat',
               'harga_produk'=>'3000',
               'deskripsi_produk'=>'Susu Mantap',
            ],
            
        ];
  
        foreach ($katalog as $key => $value) {
            Katalog::create($value);
        }
    }
}