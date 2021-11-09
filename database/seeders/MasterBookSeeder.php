<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterBook;

class MasterBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $masterBook = new MasterBook;
        $masterBook->santri_nisn = '0987654321';
        $masterBook->master_book_date_download = tanggal('now');
        $masterBook->master_book_status = '';
        $masterBook->save();
    }
}
