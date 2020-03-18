<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRdctInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdct_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_invoice', 18);
            $table->string('rdct_fundname_id',16);
            $table->string('periode',10);
            $table->integer('qty_printing');
            $table->integer('qty_inserting');
            $table->float('price_printing');
            $table->float('price_inserting');
            $table->float('cost_printing');
            $table->float('cost_inserting');
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
        Schema::dropIfExists('rdct_invoices');
    }
}
