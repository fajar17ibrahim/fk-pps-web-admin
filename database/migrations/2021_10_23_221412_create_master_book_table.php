<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_book', function (Blueprint $table) {
            $table->increments('masterbook_id', 12);
            $table->string('santri_nisn', 12)->nullable();
            $table->string('master_book_date_download', 50)->nullable();
            $table->string('master_book_status', 12)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_book');
    }
}
