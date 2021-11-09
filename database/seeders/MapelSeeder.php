<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mapel;
use App\Models\MapelTeacher;

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

        // $mapel = new Mapel;
        // $mapel->mapel_name = 'Al-Quran';
        // $mapel->mapel_kelompok = '1';
        // $save = $mapel->save();

        Mapel::insert([
            [
                'mapel_name' => 'Al-Quran',
                'mapel_kelompok' => '1'
            ],
            [
                'mapel_name' => 'Hadist',
                'mapel_kelompok' => '1'
            ],
            [
                'mapel_name' => 'Aqidah',
                'mapel_kelompok' => '1'
            ],
            [
                'mapel_name' => 'Akhlaq',
                'mapel_kelompok' => '1'
            ],
            [
                'mapel_name' => 'Fiqih',
                'mapel_kelompok' => '1'
            ],
            [
                'mapel_name' => 'Sejarah Kebudayaan Islam',
                'mapel_kelompok' => '1'
            ],
            [
                'mapel_name' => 'Bahasa Arab',
                'mapel_kelompok' => '1'
            ],
            [
                'mapel_name' => 'Pendidikan Pancasila dan Kewarganegaraan',
                'mapel_kelompok' => '1'
            ],
            [
                'mapel_name' => 'Matematika',
                'mapel_kelompok' => '1'
            ],
            [
                'mapel_name' => 'Bahasa Indonesia',
                'mapel_kelompok' => '1'
            ],
            [
                'mapel_name' => 'Bahasa Inggris',
                'mapel_kelompok' => '2'
            ],
            [
                'mapel_name' => 'Sejarah Indonesia',
                'mapel_kelompok' => '2'
            ],
            [
                'mapel_name' => 'Fisika',
                'mapel_kelompok' => '3'
            ],
            [
                'mapel_name' => 'Kimia',
                'mapel_kelompok' => '3'
            ],
            [
                'mapel_name' => 'Biologi',
                'mapel_kelompok' => '3'
            ]
        ]);
    
        $mapels = Mapel::get();
        foreach ($mapels as $mapel) {
            $mapelTeacher = new MapelTeacher;
            $mapelTeacher->mapel_id = $mapel->mapel_id;
            $mapelTeacher->class_id = '1';
            $mapelTeacher->ustadz_nik = '351315100000000';
            $mapelTeacherSaved = $mapelTeacher->save();

            $mapelTeacher = new MapelTeacher;
            $mapelTeacher->mapel_id = $mapel->mapel_id;
            $mapelTeacher->class_id = '2';
            $mapelTeacher->ustadz_nik = '351315100000000';
            $mapelTeacherSaved = $mapelTeacher->save();

            $mapelTeacher = new MapelTeacher;
            $mapelTeacher->mapel_id = $mapel->mapel_id;
            $mapelTeacher->class_id = '3';
            $mapelTeacher->ustadz_nik = '351315100000000';
            $mapelTeacherSaved = $mapelTeacher->save();
        }
        
    }
}
