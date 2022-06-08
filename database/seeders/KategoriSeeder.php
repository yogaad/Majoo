<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriProduk;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kps = [
            [ 
                'nama_kategori' => 'Premium', 
            ],
        ];


        foreach ($kps as $i => $kp) {
            $u = KategoriProduk::create([ 
                'nama_kategori' => $kp['nama_kategori'],
            ]);
        }
    }
}
