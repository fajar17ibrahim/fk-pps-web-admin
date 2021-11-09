<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportPrintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_print', function (Blueprint $table) {
            $table->increments('report_id', 12);
            $table->string('santri_nisn', 12)->nullable();
            $table->string('report_print_date_download', 50)->nullable();
            $table->string('tahun_pelajaran_id', 12)->nullable();
            $table->string('report_attiude', 12)->nullable();
            $table->string('report_attendance', 12)->nullable();
            $table->string('report_extrakurikuler', 12)->nullable();
            $table->string('report_achievement', 12)->nullable();
            $table->string('report_home_room_notes', 12)->nullable();
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
        Schema::dropIfExists('report_print');
    }
}
