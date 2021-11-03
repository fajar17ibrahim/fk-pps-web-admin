<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KelompokMapel;

class KelompokMapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       KelompokMapel::insert([
           [
                'kelompok_name' => 'Kelompok A (Umum)'
           ],
           [
                'kelompok_name' => 'Kelompok B (Umum)'
           ],
           [
                'kelompok_name' => 'Kelompok C (Peminatan)'
           ],
           [
                'kelompok_name' => 'Peminatan Matematika dan Ilmu Alam'
           ],
           [
                'kelompok_name' => 'Lintas Minat dan/atau Pendalaman'
           ],
           
       ]);

    }
}
