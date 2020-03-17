<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRdctFundmanagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdct_fundmanagers', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->primary('id');
            $table->string('id', 4);
            $table->string('fund_manager', 45);
            $table->string('currency', 3);
            $table->string('paid_by', 8);
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
        Schema::dropIfExists('rdct_fundmanagers');
    }
}
