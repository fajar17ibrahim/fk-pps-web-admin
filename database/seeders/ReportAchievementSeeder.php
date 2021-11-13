<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReportAchievement;
use App\Models\Santri;
use App\Models\SchoolYear;

class ReportAchievementSeeder extends Seeder
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
            $reportAchievement = new ReportAchievement;
            $reportAchievement->santri_nisn = $santri->santri_nisn;
            $reportAchievement->class_id = $santri->santri_class;
            $reportAchievement->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
            $reportAchievement->achievement_name = 'Olimpiade Matematika';
            $reportAchievement->achievement_description = 'Juara 1';
            $reportAchievement->save();

            $reportAchievement = new ReportAchievement;
            $reportAchievement->santri_nisn = $santri->santri_nisn;
            $reportAchievement->class_id = $santri->santri_class;
            $reportAchievement->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
            $reportAchievement->achievement_name = 'Cerdas Cermat';
            $reportAchievement->achievement_description = 'Juara 2';
            $reportAchievement->save();

            $reportAchievement = new ReportAchievement;
            $reportAchievement->santri_nisn = $santri->santri_nisn;
            $reportAchievement->class_id = $santri->santri_class;
            $reportAchievement->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
            $reportAchievement->achievement_name = 'Lomba Volly';
            $reportAchievement->achievement_description = 'Juara 2';
            $reportAchievement->save();
        }
    }
}
