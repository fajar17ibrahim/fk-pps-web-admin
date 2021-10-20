<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUstadzTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ustadz', function (Blueprint $table) {
            $table->increments('ustadz_id', 12);
            $table->string('ustadz_nik', 25);
            $table->string('ustadz_name', 255);
            $table->string('ustadz_born_place', 50);
            $table->string('ustadz_born_date', 20);
            $table->string('ustadz_gender', 20);
            $table->string('ustadz_mother_name', 255);
            $table->string('ustadz_profesion', 255);
            $table->string('ustadz_employee_status', 25);
            $table->string('ustadz_assigment_status', 25);
            $table->string('ustadz_education', 255);
            $table->string('ustadz_education_pesantren', 255);
            $table->string('ustadz_education_abroad', 255);
            $table->string('ustadz_competence', 255);
            $table->string('ustadz_address');
            $table->string('ustadz_districts', 50);
            $table->string('ustadz_city', 50);
            $table->string('ustadz_province', 50);
            $table->string('ustadz_country', 20);
            $table->string('ustadz_photo', 255);
            $table->string('ustadz_email', 50);
            $table->string('ustadz_phone', 20);
            $table->string('status', 25);
            $table->string('npsn', 25);
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
        Schema::dropIfExists('ustadz');
    }
}
