<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportAttitudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_attitude', function (Blueprint $table) {
            $table->integer('report_attitude_id', 12);
            $table->string('santri_nisn', 20)->nullable();
            $table->string('class_id', 12)->nullable();
            $table->string('tahun_pelajaran_id', 12)->nullable();
            $table->string('spiritual_attitude_pred', 20)->nullable();
            $table->text('good_spiritual_attitude')->nullable();
            $table->text('lack_of_spiritual_attitude')->nullable();
            $table->string('sosial_attitude_pred', 20)->nullable();
            $table->text('good_sosial_attitude')->nullable();
            $table->text('lack_of_sosial_attitude')->nullable();
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
        Schema::dropIfExists('report_attitude');
    }
}
