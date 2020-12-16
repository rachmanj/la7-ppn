<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEfakturDateToFaktur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fakturs', function (Blueprint $table) {
            $table->date('efaktur_date')->nullable();
            $table->string('efaktur_updatedby')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fakturs', function (Blueprint $table) {
            $table->dropColumn('efaktur_date');
        });
    }
}
