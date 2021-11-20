<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduation', function (Blueprint $table) {
            $table->increments('graduation_id', 12);
            $table->string('test_number', 20)->nullable();
            $table->string('graduation_santri', 20)->nullable();
            $table->string('graduation_class', 20)->nullable();
            $table->string('graduation_school', 20)->nullable();
            $table->string('graduated_statement', 20)->nullable();
            $table->string('graduated_year', 12)->nullable();
            $table->string('tahun_pelajaran', 12)->nullable();
            $table->string('continue_statement', 20)->nullable();
            $table->string('reason')->nullable();
            $table->string('continue_to', 20)->nullable();
            $table->string('continue_to_school_status', 20)->nullable();
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
        Schema::dropIfExists('graduation');
    }
}
