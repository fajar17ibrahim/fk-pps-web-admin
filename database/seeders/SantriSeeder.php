<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Santri;

class SantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $santri = new Santri;
        $santri->santri_name = 'Bob';
        $santri->santri_nism = '1234567890';
        $santri->santri_nisn = '0987654321';
        $santri->santri_gender = 'Laki-Laki';
        $santri->santri_born_place = 'Surabaya';
        $santri->santri_born_date = '2004-01-01';
        $santri->santri_religion = 'Islam';
        $santri->santri_hobby = 'Membaca';
        $santri->santri_goal = 'Dai';
        $santri->santri_home_status = 'Rumah Ayah';
        $santri->santri_child_of = '2';
        $santri->santri_last_school = 'MI Admin';
        $santri->santri_class_start = 'I';
        $santri->santri_class_start_date = '2020-01-01';
        $santri->santri_status = 'Aktif';
        $santri->no_kk = '35115111111111';
        $santri->father_nik = '35115111111112';
        $santri->father_name = 'Rahman';
        $santri->father_profession = 'PNS';
        $santri->father_education = 'D4 / S1 Sederajat';
        $santri->father_phone = '085111111111';
        $santri->father_salary = 'Rp. 4.000.000 - Rp. 5.000.000';
        $santri->mother_nik = '35115111111113';
        $santri->mother_name = 'Aminah';
        $santri->mother_profession = 'Ibu Rumah Tangga';
        $santri->mother_education = 'D4 / S1 Sederajat';
        $santri->mother_phone = '08522222222222';
        $santri->mother_salary = 'Rp. 3.000.000 - Rp. 4.000.000';
        $santri->wali_no_kk = '';
        $santri->wali_nik = '';
        $santri->wali_name = '';
        $santri->wali_profession = '';
        $santri->wali_education = '';
        $santri->wali_phone = '';
        $santri->wali_salary = '';
        $santri->santri_address = 'Jl Mangga No 21';
        $santri->santri_village = 'Gebang Putih'; 
        $santri->santri_rt_rw = '001/001';
        $santri->santri_districts = 'Sukolilo';
        $santri->santri_city = 'Kota Surabaya';
        $santri->santri_province = 'Jawa Timur';
        $santri->santri_pos_code = '670000';
        $santri->santri_country = 'Indonesia';
        $santri->santri_school = '1234567890';
        $santri->santri_class = '1';
        $saveSantri = $santri->save();

    }
}
