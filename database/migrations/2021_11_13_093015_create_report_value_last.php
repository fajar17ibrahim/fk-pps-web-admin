<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportValueLast extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_value_last', function (Blueprint $table) {
            $table->integer('report_value_last_id', 12);
            $table->string('mapel_id', 12)->nullable();
            $table->string('class_id', 12)->nullable();
            $table->string('santri_nisn', 20)->nullable();
            $table->string('tahun_pelajaran_id', 12)->nullable();
            $table->string('graduated_year', 6)->nullable();
            $table->string('nus', 5)->nullable();
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
        Schema::dropIfExists('report_value_last');
    }
}
