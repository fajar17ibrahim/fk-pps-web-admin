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
            $table->string('ustadz_nik', 25)->unique();
            $table->string('ustadz_name')->nullable();
            $table->string('ustadz_born_place', 50)->nullable();
            $table->string('ustadz_born_date', 20)->nullable();
            $table->string('ustadz_gender', 20)->nullable();
            $table->string('ustadz_religion', 20)->nullable();
            $table->string('ustadz_mother_name', 50)->nullable();
            $table->string('ustadz_profesion', 50)->nullable();
            $table->string('ustadz_employee_status', 25)->nullable();
            $table->string('ustadz_assigment_status', 25)->nullable();
            $table->string('ustadz_education', 100)->nullable();
            $table->string('ustadz_education_pesantren', 100)->nullable();
            $table->string('ustadz_education_abroad', 100)->nullable();
            $table->string('ustadz_competence', 100)->nullable();
            $table->string('ustadz_address')->nullable();
            $table->string('ustadz_village', 50)->nullable();
            $table->string('ustadz_rt_rw', 15)->nullable();
            $table->string('ustadz_districts', 50)->nullable();
            $table->string('ustadz_city', 50)->nullable();
            $table->string('ustadz_province', 50)->nullable();
            $table->string('ustadz_country', 20)->nullable();
            $table->string('ustadz_photo', 50)->nullable()->default('avatar.png');
            $table->string('ustadz_email', 50)->nullable();
            $table->string('ustadz_phone', 20)->nullable();
            $table->string('ustadz_school', 25)->nullable();
            $table->string('ustadz_class', 25)->nullable();
            $table->string('status', 25)->nullable();
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
