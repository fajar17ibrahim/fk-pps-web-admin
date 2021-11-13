<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportAchievement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_achievement', function (Blueprint $table) {
            $table->integer('report_achievement_id', 12);
            $table->string('santri_nisn', 20)->nullable();
            $table->string('class_id', 12)->nullable();
            $table->string('tahun_pelajaran_id', 12)->nullable();
            $table->string('achievement_name', 100)->nullable();
            $table->text('achievement_description')->nullable();
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
        Schema::dropIfExists('report_achievement');
    }
}
