<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KDKnowledge;
use App\Models\Ustadz;

class KDKnowledgeSeeder extends Seeder
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
                $kdKnowledge = new KDKnowledge;
                $kdKnowledge->ustadz_nik = $ustadz->ustadz_nik;
                $kdKnowledge->p_id = $i;
                $kdKnowledge->desc = "Mampu memahami Al-Qur'an dengan baik " . $i;
                $kdKnowledge->save();
            }
        }
    }
}
