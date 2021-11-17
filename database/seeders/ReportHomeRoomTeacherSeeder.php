<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReportHomeRoomTeacher;
use App\Models\Santri;
use App\Models\SchoolYear;

class ReportHomeRoomTeacherSeeder extends Seeder
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
            $homeRoomTeacher = new ReportHomeRoomTeacher;
            $homeRoomTeacher->santri_nisn = $santri->santri_nisn;
            $homeRoomTeacher->class_id = $santri->santri_class;
            $homeRoomTeacher->tahun_pelajaran_id = $schoolYear->tahun_pelajaran_id;
            $homeRoomTeacher->ranking = '1';
            $homeRoomTeacher->notes_by_ranking = 'Prestasinya sangat baik, perlu dipertahankan';
            $homeRoomTeacher->notes_by_option = 'Diharapkan dapat meningkatkan komitmennya untuk lebih serius saat mengerjakan tugas dan tidak mudah menyerah.';
            $homeRoomTeacher->save();
        }
    }
}
