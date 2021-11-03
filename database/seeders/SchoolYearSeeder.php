<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SchoolYear;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $schoolYear = new SchoolYear;
        $schoolYear->tahun_pelajaran_name = '2021/2022';
        $schoolYear->tahun_pelajaran_semester = '1';
        $save = $schoolYear->save();
    }
}
