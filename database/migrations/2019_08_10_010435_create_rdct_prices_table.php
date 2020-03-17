<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRdctPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdct_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('material_printing');
            $table->float('material_inserting');
            $table->float('cost_printing');
            $table->float('cost_inserting');
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
        Schema::dropIfExists('rdct_prices');
    }
}
