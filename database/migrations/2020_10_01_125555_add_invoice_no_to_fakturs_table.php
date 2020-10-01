<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInvoiceNoToFaktursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fakturs', function (Blueprint $table) {
            $table->string('invoice_no')->nullable();
            $table->text('invoice_remarks')->nullable();
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
            $table->dropColumn('invoice_no');
            $table->dropColumn('invoice_remarks');
        });
    }
}
