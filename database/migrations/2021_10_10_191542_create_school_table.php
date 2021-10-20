<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school', function (Blueprint $table) {
            $table->increments('school_id', 12)->unique();
            $table->string('school_statistic_number', 25)->unique()->nullable();
            $table->string('school_npsn', 25)->unique()->nullable();
            $table->string('school_name', 100)->nullable();
            $table->string('school_address')->nullable();
            $table->string('school_village')->nullable();
            $table->string('school_districts', 50)->nullable();
            $table->string('school_city', 50)->nullable();
            $table->string('school_province', 50)->nullable();
            $table->string('school_pos_code', 12)->nullable();
            $table->string('school_country', 25)->nullable();
            $table->integer('school_santri_total')->nullable();
            $table->integer('school_photo')->nullable();
            $table->integer('school_status')->nullable();
            $table->integer('school_headship')->nullable();
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
        Schema::dropIfExists('school');
    }
}
