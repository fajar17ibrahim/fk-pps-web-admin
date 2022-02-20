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
            $table->string('santri_nism', 20)->nullable();
            $table->string('santri_nisn', 20)->nullable();
            $table->string('santri_name')->nullable();
            $table->string('santri_gender', 20)->nullable();
            $table->string('santri_born_place', 100)->nullable();
            $table->string('santri_born_date', 20)->nullable();
            $table->string('santri_religion', 20)->nullable();
            $table->string('santri_hobby', 50)->nullable();
            $table->string('santri_goal', 50)->nullable();
            $table->string('santri_home_status', 50)->nullable();
            $table->string('santri_child_of', 20)->nullable();
            $table->string('santri_last_school', 50)->nullable();
            $table->string('santri_class_start', 10)->nullable();
            $table->string('santri_class_start_date', 20)->nullable();
            $table->string('santri_photo', 50)->nullable()->default('avatar-santri.jpg');;
            $table->string('no_kk', 20)->nullable();
            $table->string('father_nik', 20)->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_profession', 50)->nullable();
            $table->string('father_education', 50)->nullable();
            $table->string('father_phone', 20)->nullable();
            $table->string('father_salary', 50)->nullable();
            $table->string('mother_nik', 20)->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_profession', 50)->nullable();
            $table->string('mother_education', 50)->nullable();
            $table->string('mother_phone', 20)->nullable();
            $table->string('mother_salary', 50)->nullable();
            $table->string('wali_no_kk', 20)->nullable();
            $table->string('wali_nik', 20)->nullable();
            $table->string('wali_name')->nullable();
            $table->string('wali_profession', 50)->nullable();
            $table->string('wali_education', 50)->nullable();
            $table->string('wali_phone', 20)->nullable();
            $table->string('wali_salary', 50)->nullable();
            $table->string('santri_address', 100)->nullable();
            $table->string('santri_village', 50)->nullable();
            $table->string('santri_rt_rw', 15)->nullable();
            $table->string('santri_districts', 30)->nullable();
            $table->string('santri_city', 100)->nullable();
            $table->string('santri_province', 30)->nullable();
            $table->string('santri_pos_code', 10)->nullable();
            $table->string('santri_country', 30)->nullable();
            $table->string('santri_school', 12)->nullable();
            $table->string('santri_class', 12)->nullable();
            $table->string('santri_status', 12)->nullable();
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
