<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaktursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fakturs', function (Blueprint $table) {
            $table->id();
            $table->string('document_no')->nullable();
            $table->string('vendor_code')->nullable();
            $table->string('faktur_no')->nullable();
            $table->date('faktur_date')->nullable();
            $table->double('amount')->nullable();
            $table->date('creation_date')->nullable();
            $table->date('posting_date')->nullable();
            $table->string('project_code')->nullable();
            $table->string('doc_type')->nullable();
            $table->text('remark')->nullable();
            $table->string('sap_user')->nullable(); //user pengimput di SAP
            $table->string('created_by')->nullable(); //user pengimput di aplikasi
            $table->date('receive_date')->nullable(); //tgl terima faktur di bpp
            $table->string('receive_updated_by')->nullable(); //user update terima faktur
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
        Schema::dropIfExists('fakturs');
    }
}
