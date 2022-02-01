<?php

namespace Database\Seeders;

use App\Models\Extrakurikuler;
use Illuminate\Database\Seeder;

class ExtrakurikulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Extrakurikuler::insert([
            [
                 'extra_name' => 'Sepak Bola'
            ],
            [
                 'extra_name' => 'Bola Basket'
            ],
            [
                 'extra_name' => 'Bola Voli'
            ],
            [
                 'extra_name' => 'Badminton'
            ],
            [
                 'extra_name' => 'Tenis Meja'
            ],
            [
                 'extra_name' => 'Futsal'
            ],
            [
                 'extra_name' => 'Renang'
            ],
            [
                 'extra_name' => 'Paduan Suara'
            ],
            [
                 'extra_name' => 'Marching Band'
            ],
            [
                 'extra_name' => 'Band'
            ],
            [
                 'extra_name' => 'Nasyid'
            ],
            [
                 'extra_name' => 'Qasidah'
            ],
            [
                 'extra_name' => 'Orkestra'
            ],
            [
                 'extra_name' => 'Karawitan'
            ],
            [
                 'extra_name' => 'Teater'
            ],
            [
                 'extra_name' => 'Tarian Tradisional'
            ],
            [
                 'extra_name' => 'Modern Dance'
            ],
            [
                 'extra_name' => 'Cheerleader'
            ],
            [
                 'extra_name' => 'Gulat'
            ],
            [
                 'extra_name' => 'Silat'
            ],
            [
                 'extra_name' => 'Tae Kwon Do'
            ],
            [
                 'extra_name' => 'Karate'
            ],
            [
                 'extra_name' => 'Wushu'
            ],
            [
                 'extra_name' => 'Merpati Putih'
            ],
            [
                 'extra_name' => 'Jurnalistik'
            ],
            [
                 'extra_name' => 'Fotografi'
            ],
            [
                 'extra_name' => 'Mading'
            ],
            [
                 'extra_name' => 'Pramuka'
            ],
            [
                 'extra_name' => 'Paskibra'
            ],
            [
                 'extra_name' => 'Komputer'
            ],
            [
                 'extra_name' => 'Pecinta Alam'
            ],
            [
                 'extra_name' => 'Bahasa'
            ],
            [
                 'extra_name' => 'Otomotif'
            ],
            [
                 'extra_name' => 'Palang Merah Remaja (PMR)'
            ],
            [
                 'extra_name' => 'Karya Ilmiah Remaja (KIR)'
            ],
            [
                 'extra_name' => 'Kerohanian (Rohis, Rohkris, Irma, dll)'
            ],
            [
                 'extra_name' => 'Wirausaha'
            ],
            [
                 'extra_name' => 'Koperasi Siswa / Kopsis'
            ],
            [
                 'extra_name' => 'Robotik'
            ],
            [
                'extra_name' => 'Programmer'
            ],
            
        ]);
    }
}
