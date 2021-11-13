<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReportValue;
use App\Models\Santri;
use App\Models\ReportPrint;
use App\Models\SchoolYear;
use App\Models\MapelTeacher;

class ReportValueSeeder extends Seeder
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
        $mapels = MapelTeacher::where('class_id', '=', $santri->santri_class)->get();
        foreach ($schoolYears as $schoolYear) {
            foreach ($mapels as $mapel) {
                ReportValue::insert([
                    [
                        'mapel_id' => $mapel->mapel_id,
                        'class_id' => $santri->santri_class,
                        'santri_nisn' => $santri->santri_nisn,
                        'tahun_pelajaran_id' => $schoolYear->tahun_pelajaran_id,
                        'report_kkm' => '80',
                        'jp' => '80',
                        'p1' => '83',
                        'p2' => '84',
                        'p3' => '80',
                        'p4' => '90',
                        'p5' => '87',
                        'p6' => '87',
                        'p7' => '83',
                        'p8' => '84',
                        'p9' => '87',
                        'p10' => '88',
                        'rph' => '81',
                        'pts' => '81',
                        'pas' => '81',
                        'knowledge_pre' => 'B',
                        'knowledge_desc' => '',
                        'k1' => '82',
                        'k2' => '83',
                        'k3' => '85',
                        'k4' => '83',
                        'k5' => '88',
                        'k6' => '89',
                        'k7' => '83',
                        'k8' => '89',
                        'k9' => '891',
                        'k10' => '82',
                        'hpa' => '82',
                        'skills_pre' => 'B',
                        'skills_desc' => '',
                        'created_at' => tanggal('now'),
                        'updated_at' => tanggal('now')
                    ]
                ]);
            }
        }
    }
}
