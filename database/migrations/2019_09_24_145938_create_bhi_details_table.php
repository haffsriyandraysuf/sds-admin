<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBhiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bhi_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bhi_invoice_id');
            $table->string('sub_produk', 10);
            $table->integer('qty_print', null);
            $table->integer('qty_insert', null);
            $table->float('material_printing');
            $table->float('cost_printing');
            $table->float('material_inserting');
            $table->float('cost_inserting');
            $table->float('biaya_kertas', null);
            $table->float('biaya_amplop', null);
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
        Schema::dropIfExists('bhi_details');
    }
}
