<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Graduation;

class GraduationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $graduation = new Graduation;
        $graduation->test_number = '1202129111';
        $graduation->graduation_santri = '0987654321';
        $graduation->graduation_class = '1';
        $graduation->graduation_school = '1234567890';
        $graduation->graduated_statement = 'Lulus';
        $graduation->graduated_year = '2021';
        $graduation->tahun_pelajaran = '1';
        $graduation->continue_statement = 'Melanjutkan';
        $graduation->reason = '';
        $graduation->continue_to = 'Ulya';
        $graduation->continue_to_school_status = 'Swasta';    
        $save = $graduation->save();
    }
}
