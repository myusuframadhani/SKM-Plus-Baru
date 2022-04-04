<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cabang;

class CreateCabangsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cabang = [
            [
               'nama_cabang'=>'Cabang Jember',
               'alamat'=>'Antirogo, Kec. Sumbersari, Kabupaten Jember, Jawa Timur',
            ],
            [
                'nama_cabang'=>'Cabang Kediri',
                'alamat'=>'Tamanan, Kec. Mojoroto, Kabupaten Kediri, Jawa Timur',
            ],
            [
                'nama_cabang'=>'Cabang Magelang',
                'alamat'=>'Rejowinangun Utara, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah',
            ],
            [
                'nama_cabang'=>'Cabang Deli Serdang',
                'alamat'=>'Jl. Benteng No.55, Kedai Durian, Kec. Deli Tua, Kabupaten Deli Serdang, Sumatera Utara',
            ],
        ];
  
        foreach ($cabang as $key => $value) {
            Cabang::create($value);
        }
    }
}
