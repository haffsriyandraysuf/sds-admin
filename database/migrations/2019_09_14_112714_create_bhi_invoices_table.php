<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBhiInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bhi_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_invoice', 20);
            $table->string('periode', 10);
            $table->string('produk', 10);
            $table->integer('total');
            $table->integer('ppn');
            $table->integer('pph');
            $table->integer('amount');
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
        Schema::dropIfExists('bhi_invoices');
    }
}
