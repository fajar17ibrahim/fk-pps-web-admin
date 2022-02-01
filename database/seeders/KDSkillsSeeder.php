<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KDSkills;
use App\Models\Ustadz;

class KDSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $ustadzs = Ustadz::get();

        foreach($ustadzs as $ustadz) {
            for ($i = 1; $i <= 10; $i++) {
                $kdSkills = new KDSkills;
                $kdSkills->mapel_teacher = "1";
                $kdSkills->k_id = $i;
                $kdSkills->desc = "Mampu Berkomunikasi " . $i;
                $kdSkills->save();
            }
        }
    }
}
