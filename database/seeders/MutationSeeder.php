<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mutation;

class MutationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $mutation = new Mutation;
        $mutation->mutation_santri = '0987654321';
        $mutation->mutation_class = '1';
        $mutation->mutation_school = '1234567890';
        $mutation->mutation_class_destination = '2';
        $mutation->mutation_school_destination = '1234567890';
        $mutation->mutation_statement = 'Melanjutkan';
        $mutation->reason = ''; 
        $save = $mutation->save();
    }
}
