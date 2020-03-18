<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBhiPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bhi_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('produk', 10);
            $table->string('sub_produk', 10);
            $table->float('material_printing');
            $table->float('cost_printing');
            $table->float('material_inserting');
            $table->float('cost_inserting');
            $table->float('biaya_kertas', NULL);
            $table->float('biaya_amplop', NULL);
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
        Schema::dropIfExists('bhi_prices');
    }
}
