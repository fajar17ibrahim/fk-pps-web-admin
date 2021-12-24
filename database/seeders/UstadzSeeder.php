<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ustadz;

class UstadzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ustadz = new Ustadz;
        $ustadz->ustadz_nik = '351315000000000';
        $ustadz->ustadz_name = 'CEO';
        $ustadz->ustadz_born_place = 'Surabaya';
        $ustadz->ustadz_born_date = '1991-01-01';
        $ustadz->ustadz_gender = 'Laki-Laki';
        $ustadz->ustadz_religion = 'Islam';
        $ustadz->ustadz_mother_name = 'Alice';
        $ustadz->ustadz_profesion = 'Pendidik';
        $ustadz->ustadz_employee_status = 'Tidak Ada';
        $ustadz->ustadz_assigment_status = 'Tidak Ada';
        $ustadz->ustadz_education = 'Tidak Ada';
        $ustadz->ustadz_education_pesantren = 'Tidak Ada';
        $ustadz->ustadz_education_abroad = 'Tidak Ada';
        $ustadz->ustadz_competence = 'Tidak Ada';
        $ustadz->ustadz_address = 'Jl Mangga No 21';
        $ustadz->ustadz_rt_rw = '001/001';
        $ustadz->ustadz_village = 'Gebang Putih'; 
        $ustadz->ustadz_districts = 'Sukolilo';
        $ustadz->ustadz_city = 'Kota Surabaya';
        $ustadz->ustadz_province = 'Jawa Timur';
        $ustadz->ustadz_country = 'Indonesia';
        $ustadz->ustadz_email = 'ceo@gmail.com';
        $ustadz->ustadz_phone = '081000000000';
        $ustadz->ustadz_photo = 'avatar.png';
        $ustadz->ustadz_school = '1';
        $ustadz->ustadz_class = '1';
        $ustadz->status = 'Aktif';
        $saveUstadz = $ustadz->save();

        $ustadz = new Ustadz;
        $ustadz->ustadz_nik = '351315100000001';
        $ustadz->ustadz_name = 'Admin Ula';
        $ustadz->ustadz_born_place = 'Surabaya';
        $ustadz->ustadz_born_date = '1991-01-01';
        $ustadz->ustadz_gender = 'Laki-Laki';
        $ustadz->ustadz_religion = 'Islam';
        $ustadz->ustadz_mother_name = 'Alice';
        $ustadz->ustadz_profesion = 'Pendidik';
        $ustadz->ustadz_employee_status = 'Tidak Ada';
        $ustadz->ustadz_assigment_status = 'Tidak Ada';
        $ustadz->ustadz_education = 'Tidak Ada';
        $ustadz->ustadz_education_pesantren = 'Tidak Ada';
        $ustadz->ustadz_education_abroad = 'Tidak Ada';
        $ustadz->ustadz_competence = 'Tidak Ada';
        $ustadz->ustadz_address = 'Jl Mangga No 21';
        $ustadz->ustadz_rt_rw = '001/001';
        $ustadz->ustadz_village = 'Gebang Putih'; 
        $ustadz->ustadz_districts = 'Sukolilo';
        $ustadz->ustadz_city = 'Kota Surabaya';
        $ustadz->ustadz_province = 'Jawa Timur';
        $ustadz->ustadz_country = 'Indonesia';
        $ustadz->ustadz_email = 'admin-ula@gmail.com';
        $ustadz->ustadz_phone = '081000000000';
        $ustadz->ustadz_photo = 'avatar.png';
        $ustadz->ustadz_school = '1';
        $ustadz->ustadz_class = '1';
        $ustadz->status = 'Aktif';
        $saveUstadz = $ustadz->save();

        $ustadz = new Ustadz;
        $ustadz->ustadz_nik = '351315110000003';
        $ustadz->ustadz_name = 'Admin Wustha';
        $ustadz->ustadz_born_place = 'Surabaya';
        $ustadz->ustadz_born_date = '1991-01-01';
        $ustadz->ustadz_gender = 'Laki-Laki';
        $ustadz->ustadz_religion = 'Islam';
        $ustadz->ustadz_mother_name = 'Alice';
        $ustadz->ustadz_profesion = 'Pendidik';
        $ustadz->ustadz_employee_status = 'Tidak Ada';
        $ustadz->ustadz_assigment_status = 'Tidak Ada';
        $ustadz->ustadz_education = 'Tidak Ada';
        $ustadz->ustadz_education_pesantren = 'Tidak Ada';
        $ustadz->ustadz_education_abroad = 'Tidak Ada';
        $ustadz->ustadz_competence = 'Tidak Ada';
        $ustadz->ustadz_address = 'Jl Mangga No 21';
        $ustadz->ustadz_rt_rw = '001/001';
        $ustadz->ustadz_village = 'Gebang Putih'; 
        $ustadz->ustadz_districts = 'Sukolilo';
        $ustadz->ustadz_city = 'Kota Surabaya';
        $ustadz->ustadz_province = 'Jawa Timur';
        $ustadz->ustadz_country = 'Indonesia';
        $ustadz->ustadz_email = 'admin-wustha@gmail.com';
        $ustadz->ustadz_phone = '081000000000';
        $ustadz->ustadz_photo = 'avatar.png';
        $ustadz->ustadz_school = '1';
        $ustadz->ustadz_class = '2';
        $ustadz->status = 'Aktif';
        $saveUstadz = $ustadz->save();

        
        $ustadz = new Ustadz;
        $ustadz->ustadz_nik = '351315120000004';
        $ustadz->ustadz_name = 'Admin Ulya';
        $ustadz->ustadz_born_place = 'Surabaya';
        $ustadz->ustadz_born_date = '1991-01-01';
        $ustadz->ustadz_gender = 'Laki-Laki';
        $ustadz->ustadz_religion = 'Islam';
        $ustadz->ustadz_mother_name = 'Alice';
        $ustadz->ustadz_profesion = 'Pendidik';
        $ustadz->ustadz_employee_status = 'Tidak Ada';
        $ustadz->ustadz_assigment_status = 'Tidak Ada';
        $ustadz->ustadz_education = 'Tidak Ada';
        $ustadz->ustadz_education_pesantren = 'Tidak Ada';
        $ustadz->ustadz_education_abroad = 'Tidak Ada';
        $ustadz->ustadz_competence = 'Tidak Ada';
        $ustadz->ustadz_address = 'Jl Mangga No 21';
        $ustadz->ustadz_rt_rw = '001/001';
        $ustadz->ustadz_village = 'Gebang Putih'; 
        $ustadz->ustadz_districts = 'Sukolilo';
        $ustadz->ustadz_city = 'Kota Surabaya';
        $ustadz->ustadz_province = 'Jawa Timur';
        $ustadz->ustadz_country = 'Indonesia';
        $ustadz->ustadz_email = 'admin-ulya@gmail.com';
        $ustadz->ustadz_phone = '081000000000';
        $ustadz->ustadz_photo = 'avatar.png';
        $ustadz->ustadz_school = '1';
        $ustadz->ustadz_class = '3';
        $ustadz->status = 'Aktif';
        $saveUstadz = $ustadz->save();

        $ustadz = new Ustadz;
        $ustadz->ustadz_nik = '351315200000005';
        $ustadz->ustadz_name = 'Wali Kelas';
        $ustadz->ustadz_born_place = 'Surabaya';
        $ustadz->ustadz_born_date = '1991-01-01';
        $ustadz->ustadz_gender = 'Laki-Laki';
        $ustadz->ustadz_religion = 'Islam';
        $ustadz->ustadz_mother_name = 'Alice';
        $ustadz->ustadz_profesion = 'Pendidik';
        $ustadz->ustadz_employee_status = 'Tidak Ada';
        $ustadz->ustadz_assigment_status = 'Tidak Ada';
        $ustadz->ustadz_education = 'Tidak Ada';
        $ustadz->ustadz_education_pesantren = 'Tidak Ada';
        $ustadz->ustadz_education_abroad = 'Tidak Ada';
        $ustadz->ustadz_competence = 'Tidak Ada';
        $ustadz->ustadz_address = 'Jl Mangga No 21';
        $ustadz->ustadz_rt_rw = '001/001';
        $ustadz->ustadz_village = 'Gebang Putih'; 
        $ustadz->ustadz_districts = 'Sukolilo';
        $ustadz->ustadz_city = 'Kota Surabaya';
        $ustadz->ustadz_province = 'Jawa Timur';
        $ustadz->ustadz_country = 'Indonesia';
        $ustadz->ustadz_email = 'walikelas@gmail.com';
        $ustadz->ustadz_phone = '081000000000';
        $ustadz->ustadz_photo = 'avatar.png';
        $ustadz->ustadz_school = '1';
        $ustadz->ustadz_class = '1';
        $ustadz->status = 'Aktif';
        $saveUstadz = $ustadz->save();

        $ustadz = new Ustadz;
        $ustadz->ustadz_nik = '351315300000006';
        $ustadz->ustadz_name = 'Guru';
        $ustadz->ustadz_born_place = 'Surabaya';
        $ustadz->ustadz_born_date = '1991-01-01';
        $ustadz->ustadz_gender = 'Laki-Laki';
        $ustadz->ustadz_religion = 'Islam';
        $ustadz->ustadz_mother_name = 'Alice';
        $ustadz->ustadz_profesion = 'Pendidik';
        $ustadz->ustadz_employee_status = 'Tidak Ada';
        $ustadz->ustadz_assigment_status = 'Tidak Ada';
        $ustadz->ustadz_education = 'Tidak Ada';
        $ustadz->ustadz_education_pesantren = 'Tidak Ada';
        $ustadz->ustadz_education_abroad = 'Tidak Ada';
        $ustadz->ustadz_competence = 'Tidak Ada';
        $ustadz->ustadz_address = 'Jl Mangga No 21';
        $ustadz->ustadz_rt_rw = '001/001';
        $ustadz->ustadz_village = 'Gebang Putih'; 
        $ustadz->ustadz_districts = 'Sukolilo';
        $ustadz->ustadz_city = 'Kota Surabaya';
        $ustadz->ustadz_province = 'Jawa Timur';
        $ustadz->ustadz_country = 'Indonesia';
        $ustadz->ustadz_email = 'guru@gmail.com';
        $ustadz->ustadz_phone = '081000000000';
        $ustadz->ustadz_photo = 'avatar.png';
        $ustadz->ustadz_school = '1';
        $ustadz->ustadz_class = '1';
        $ustadz->status = 'Aktif';
        $saveUstadz = $ustadz->save();

        
    
    }
}
