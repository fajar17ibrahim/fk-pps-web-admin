<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santri', function (Blueprint $table) {
            $table->increments('santri_id', 12);
            $table->string('santri_nism', 20);
            $table->string('santri_nisn', 20);
            $table->string('santri_name', 50);
            $table->string('santri_gender', 20);
            $table->string('santri_born_place', 20);
            $table->string('santri_born_date', 20);
            $table->string('santri_religion', 20);
            $table->string('santri_hobby', 20);
            $table->string('santri_goal', 20);
            $table->string('santri_home_status', 50);
            $table->string('santri_child_of', 20);
            $table->string('santri_last_school', 50);
            $table->string('santri_class_start', 10);
            $table->string('santri_class_start_date', 20);
            $table->string('no_kk', 20);
            $table->string('father_nik', 20);
            $table->string('father_name', 20);
            $table->string('father_profession', 50);
            $table->string('father_education', 50);
            $table->string('father_phone', 20);
            $table->string('father_salary', 50);
            $table->string('mother_nik', 20);
            $table->string('mother_name', 20);
            $table->string('mother_profession', 50);
            $table->string('mother_education', 50);
            $table->string('mother_phone', 20);
            $table->string('mother_salary', 50);
            $table->string('wali_no_kk', 20);
            $table->string('wali_nik', 20);
            $table->string('wali_name', 20);
            $table->string('wali_profession', 50);
            $table->string('wali_education', 50);
            $table->string('wali_phone', 20);
            $table->string('wali_salary', 50);
            $table->string('santri_address', 100);
            $table->string('santri_village', 50);
            $table->string('santri_rt_rw', 6);
            $table->string('santri_districts', 30);
            $table->string('santri_city', 30);
            $table->string('santri_province', 30);
            $table->string('santri_pos_code', 10);
            $table->string('santri_country', 30);
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
        Schema::dropIfExists('santri');
    }
}
