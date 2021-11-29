<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_value', function (Blueprint $table) {
            $table->integer('report_value_id', 12);
            $table->string('mapel_id', 12)->nullable();
            $table->string('class_id', 12)->nullable();
            $table->string('santri_nisn', 20)->nullable();
            $table->string('tahun_pelajaran_id', 12)->nullable();
            $table->string('report_kkm', 5)->nullable();
            $table->string('jp', 5)->nullable();
            $table->string('p1', 5)->nullable();
            $table->string('p2', 5)->nullable();
            $table->string('p3', 5)->nullable();
            $table->string('p4', 5)->nullable();
            $table->string('p5', 5)->nullable();
            $table->string('p6', 5)->nullable();
            $table->string('p7', 5)->nullable();
            $table->string('p8', 5)->nullable();
            $table->string('p9', 5)->nullable();
            $table->string('p10', 5)->nullable();
            $table->string('rph', 5)->nullable();
            $table->string('pts', 5)->nullable();
            $table->string('pas', 5)->nullable();
            $table->string('knowledge_pre', 5)->nullable();
            $table->text('knowledge_desc')->nullable();
            $table->string('k1', 5)->nullable();
            $table->string('k2', 5)->nullable();
            $table->string('k3', 5)->nullable();
            $table->string('k4', 5)->nullable();
            $table->string('k5', 5)->nullable();
            $table->string('k6', 5)->nullable();
            $table->string('k7', 5)->nullable();
            $table->string('k8', 5)->nullable();
            $table->string('k9', 5)->nullable();
            $table->string('k10', 5)->nullable();
            $table->string('rpk', 5)->nullable();
            $table->string('hpa', 5)->nullable();
            $table->string('skills_pre', 5)->nullable();
            $table->text('skills_desc')->nullable();
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
        Schema::dropIfExists('report_value');
    }
}
