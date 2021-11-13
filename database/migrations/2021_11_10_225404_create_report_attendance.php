<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportAttendance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_attendance', function (Blueprint $table) {
            $table->integer('report_attendance_id', 12);
            $table->string('santri_nisn', 20)->nullable();
            $table->string('class_id', 12)->nullable();
            $table->string('tahun_pelajaran_id', 12)->nullable();
            $table->string('s', 5)->nullable();
            $table->string('i', 5)->nullable();
            $table->string('a', 5)->nullable();
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
        Schema::dropIfExists('report_attendance');
    }
}
