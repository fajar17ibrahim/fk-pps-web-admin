<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReportPrint;
use App\Models\SchoolYear;

class ReportPrintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $schoolYears = SchoolYear::get();
        foreach ($schoolYears as $schoolYear) {
            $reportPrint = new ReportPrint;
            $reportPrint->santri_nisn = '0987654321';
            $reportPrint->report_print_date_download = tanggal('now');
            $reportPrint->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
            $reportPrint->save();
        }
    }
}
