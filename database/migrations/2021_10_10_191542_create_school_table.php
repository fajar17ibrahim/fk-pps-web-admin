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
            $table->string('school_email', 50)->nullable();
            $table->string('school_phone', 20)->nullable();
            $table->string('school_address')->nullable();
            $table->string('school_village', 50)->nullable();
            $table->string('school_rt_rw', 15)->nullable();
            $table->string('school_districts', 50)->nullable();
            $table->string('school_city', 50)->nullable();
            $table->string('school_province', 50)->nullable();
            $table->string('school_pos_code', 12)->nullable();
            $table->string('school_country', 25)->nullable();
            $table->string('school_santri_total', 12)->nullable();
            $table->string('school_photo', 50)->nullable()->default('logo_fk_pkpps.jpg');
            $table->string('school_status', 15)->nullable();
            $table->string('school_headship', 25)->nullable();
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
