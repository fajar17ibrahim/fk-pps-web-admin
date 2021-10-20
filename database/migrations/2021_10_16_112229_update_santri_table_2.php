<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSantriTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('santri', function (Blueprint $table) {
            //
            $table->string('santri_school', 12);
            $table->string('santri_class', 12);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('santri', function (Blueprint $table) {
            //
            $table->dropColumn('santri_school');
            $table->dropColumn('santri_class');
        });
    }
}
