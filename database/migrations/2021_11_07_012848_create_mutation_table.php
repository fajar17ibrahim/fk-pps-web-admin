<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutation', function (Blueprint $table) {
            $table->increments('mutation_id', 12);
            $table->string('mutation_santri', 20);
            $table->string('mutation_class', 20);
            $table->string('mutation_school', 20);
            $table->string('mutation_class_destination', 20);
            $table->string('mutation_school_destination', 20);
            $table->string('mutation_statement', 20);
            $table->string('reason', 20);
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
        Schema::dropIfExists('mutation');
    }
}
