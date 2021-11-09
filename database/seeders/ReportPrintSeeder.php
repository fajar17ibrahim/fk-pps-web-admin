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
        $schoolYear = SchoolYear::orderBy('tahun_pelajaran_id', 'desc')->first();
        $reportPrint = new ReportPrint;
        $reportPrint->santri_nisn = '0987654321';
        $reportPrint->report_print_date_download = tanggal('now');
        $reportPrint->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
        $reportPrint->report_attiude = '';
        $reportPrint->report_attendance = '';
        $reportPrint->report_extrakurikuler = '';
        $reportPrint->report_achievement = '';
        $reportPrint->report_home_room_notes = '';
        $reportPrint->save();
    }
}
