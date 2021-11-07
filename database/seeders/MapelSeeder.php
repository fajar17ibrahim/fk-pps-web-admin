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

        $mapel = new Mapel;
        $mapel->mapel_name = 'Al-Quran';
        $mapel->mapel_kelompok = '1';
        $save = $mapel->save();
    
        if ($save) {
            $mapelLast = Mapel::orderBy('mapel_id', 'desc')->first();

            $mapelTeacher = new MapelTeacher;
            $mapelTeacher->mapel_id = $mapelLast->mapel_id;
            $mapelTeacher->class_id = '1';
            $mapelTeacher->ustadz_nik = '';
            $mapelTeacherSaved = $mapelTeacher->save();

            $mapelTeacher = new MapelTeacher;
            $mapelTeacher->mapel_id = $mapelLast->mapel_id;
            $mapelTeacher->class_id = '2';
            $mapelTeacher->ustadz_nik = '';
            $mapelTeacherSaved = $mapelTeacher->save();

            $mapelTeacher = new MapelTeacher;
            $mapelTeacher->mapel_id = $mapelLast->mapel_id;
            $mapelTeacher->class_id = '3';
            $mapelTeacher->ustadz_nik = '';
            $mapelTeacherSaved = $mapelTeacher->save();
        }
        
    }
}
