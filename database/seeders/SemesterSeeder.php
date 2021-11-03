<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Semester;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Semester::insert([
            [
                 'semester_name' => 'Ganjil'
            ],
            [
                 'semester_name' => 'Genap'
            ]            
        ]);
    }
}
