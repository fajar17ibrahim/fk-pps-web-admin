<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReportExtrakurikuler;
use App\Models\Santri;
use App\Models\SchoolYear;

class ReportExtrakurikulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $santri = Santri::orderBy('santri_id', 'asc')->first();
        $schoolYears = SchoolYear::get();
        foreach ($schoolYears as $schoolYear) {
            $reportExtrakurikuler = new ReportExtrakurikuler;
            $reportExtrakurikuler->santri_nisn = $santri->santri_nisn;
            $reportExtrakurikuler->class_id = $santri->santri_class;
            $reportExtrakurikuler->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
            $reportExtrakurikuler->extra_name = 'Pendidikan Kepramukaan';
            $reportExtrakurikuler->extra_value = 'A';
            $reportExtrakurikuler->extra_description = '';
            $reportExtrakurikuler->save();

            $reportExtrakurikuler = new ReportExtrakurikuler;
            $reportExtrakurikuler->santri_nisn = $santri->santri_nisn;
            $reportExtrakurikuler->class_id = $santri->santri_class;
            $reportExtrakurikuler->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
            $reportExtrakurikuler->extra_name = 'Drumband';
            $reportExtrakurikuler->extra_value = 'AB';
            $reportExtrakurikuler->extra_description = '';
            $reportExtrakurikuler->save();

            $reportExtrakurikuler = new ReportExtrakurikuler;
            $reportExtrakurikuler->santri_nisn = $santri->santri_nisn;
            $reportExtrakurikuler->class_id = $santri->santri_class;
            $reportExtrakurikuler->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
            $reportExtrakurikuler->extra_name = 'Sepak Bola';
            $reportExtrakurikuler->extra_value = 'A';
            $reportExtrakurikuler->extra_description = '';
            $reportExtrakurikuler->save();
        }

    }
}
