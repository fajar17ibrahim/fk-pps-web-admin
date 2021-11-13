<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Santri;
use App\Models\ReportValueLast;
use App\Models\SchoolYear;
use App\Models\MapelTeacher;

class ReportValueLastSeeder extends Seeder
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
        $schoolYear = SchoolYear::orderBy('tahun_pelajaran_id', 'asc')->first();
        $mapels = MapelTeacher::where('class_id', '=', $santri->santri_class)->get();
        foreach ($mapels as $mapel) {
            ReportValueLast::insert([
                    'mapel_id' => $mapel->mapel_id,
                    'class_id' => $santri->santri_class,
                    'santri_nisn' => $santri->santri_nisn,
                    'tahun_pelajaran_id' => $schoolYear->tahun_pelajaran_id,
                    'graduated_year' => '2021',
                    'nus' => '80',
                ]);
            }
        }
    }

