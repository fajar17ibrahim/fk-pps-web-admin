<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $school = new School;
        $school->school_statistic_number = '0987654321';
        $school->school_npsn = '1234567890';
        $school->school_name = 'PPS Admin';
        $school->school_level = 'Ula';
        $school->school_email = 'pps-admin@gmail.com';
        $school->school_phone = '085000000000';
        $school->school_photo = 'logo_fk_pkpps.jpg';
        $school->school_address = 'Jl Mangga No 21';
        $school->school_rt_rw = '001/001';
        $school->school_village = 'Gebang Putih'; 
        $school->school_districts = 'Sukolilo';
        $school->school_city = 'Kota Surabaya';
        $school->school_province = 'Jawa Timur';
        $school->school_pos_code = '670000';
        $school->school_country = 'Indonesia';
        $school->school_status = 'Aktif';
        $school->school_headship = '351315120000000';
        $saveschool = $school->save();
    }
}
