<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWakiInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waki_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_invoice', 20);
            $table->string('bank', 20);
            $table->string('nama_file', 50);
            $table->integer('qty_printing');
            $table->integer('price_material');
            $table->integer('cost_service');
            $table->integer('total');
            $table->integer('ppn');
            $table->integer('amount');
            $table->date('tProses');
            $table->date('tTerima');
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
        Schema::dropIfExists('waki_invoices');
    }
}
