<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapel_teacher', function (Blueprint $table) {
            $table->integer('mapel_teacher_id', 12);
            $table->string('mapel_id', 12)->nullable();
            $table->string('class_id', 12)->nullable();
            $table->string('ustadz_nik', 25)->nullable();
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
        Schema::dropIfExists('mapel_teacher');
    }
}
