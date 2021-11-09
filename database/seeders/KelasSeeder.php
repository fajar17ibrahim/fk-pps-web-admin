<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kelas = new Kelas;
        $kelas->class_name = 'I';
        $kelas->class_level = 'Ula';
        $kelas->class_school = '1234567890';
        $kelas->homeroom_teacher = '351315100000000';
        $save = $kelas->save();

        $kelas = new Kelas;
        $kelas->class_name = 'VII';
        $kelas->class_level = 'Wustha';
        $kelas->class_school = '1234567890';
        $kelas->homeroom_teacher = '351315120000000';
        $save = $kelas->save();

        $kelas = new Kelas;
        $kelas->class_name = 'IX';
        $kelas->class_level = 'Ulya';
        $kelas->class_school = '1234567890';
        $kelas->homeroom_teacher = '351315200000000';
        $save = $kelas->save();
    }
}
