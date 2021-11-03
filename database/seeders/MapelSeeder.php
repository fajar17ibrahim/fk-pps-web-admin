<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mapel;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $mapel = new Mapel;
        $mapel->mapel_name = 'Al-Quran';
        $mapel->mapel_kelompok = '1';
        $save = $mapel->save();
    }
}
