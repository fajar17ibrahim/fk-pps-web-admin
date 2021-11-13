<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ReportAttendance;
use App\Models\Santri;
use App\Models\SchoolYear;

class ReportAttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $santri = Santri::orderBy('santri_name', 'asc')->first();
        $schoolYears = SchoolYear::get();
        foreach ($schoolYears as $schoolYear) {
            $reportAttendance = new ReportAttendance;
            $reportAttendance->santri_nisn = $santri->santri_nisn;
            $reportAttendance->class_id = $santri->santri_class;
            $reportAttendance->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
            $reportAttendance->s = '5';
            $reportAttendance->i = '1';
            $reportAttendance->a = '0';
            $reportAttendance->save();
        }
    }
}
