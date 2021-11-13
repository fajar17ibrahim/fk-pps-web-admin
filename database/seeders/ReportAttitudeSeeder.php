<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Santri;
use App\Models\SchoolYear;
use App\Models\ReportAttitude;

class ReportAttitudeSeeder extends Seeder
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
            $reportAttitude = new ReportAttitude;
            $reportAttitude->santri_nisn = $santri->santri_nisn;
            $reportAttitude->class_id = $santri->santri_class;
            $reportAttitude->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
            $reportAttitude->spiritual_attitude_pred = 'SB';
            $reportAttitude->good_spiritual_attitude = 'Berdoa sebelum dan sesudah melakukan kegiatan. Menjalankan ibadah sesuai dengan agamanya. Memberi salam pada saat awal dan akhir kegiatan';
            $reportAttitude->lack_of_spiritual_attitude = 'Menghormati orang lain yang menjalankan ibadah sesuai dengan agamanya';
            $reportAttitude->sosial_attitude_pred = 'CB ';
            $reportAttitude->good_sosial_attitude = 'Jujur, Disiplin, anggung jawab';
            $reportAttitude->lack_of_sosial_attitude = 'Percaya diri, Peduli';
            $reportAttitude->save();
        }
    }
}
