<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportHomeRoomTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_home_room_teacher', function (Blueprint $table) {
            $table->integer('report_home_room_teacher_id', 12);
            $table->string('santri_nisn', 20)->nullable();
            $table->string('class_id', 12)->nullable();
            $table->string('tahun_pelajaran_id', 12)->nullable();
            $table->string('ranking', 5)->nullable();
            $table->text('notes_by_ranking')->nullable();
            $table->text('notes_by_option')->nullable();
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
        Schema::dropIfExists('report_home_room_teacher');
    }
}
