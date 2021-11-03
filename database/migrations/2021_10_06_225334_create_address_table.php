<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('address_id', 12);
            $table->string('address_province', 50)->nullable();
            $table->string('address_kab_or_city', 50)->nullable();
            $table->string('address_kab_or_city_name', 50)->nullable();
            $table->string('address_distic', 50)->nullable();
            $table->string('address_village', 50)->nullable();
            $table->string('address_pos_code', 10)->nullable();
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
        Schema::dropIfExists('address');
    }
}
