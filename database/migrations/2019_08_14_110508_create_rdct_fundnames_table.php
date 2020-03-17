<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRdctFundnamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdct_fundnames', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->primary('id');
            $table->string('id', 16);
            $table->string('fund_name', 70);
            $table->string('rdct_fundmanager_id', 4);
            $table->string('fn_code_old', 6);
            $table->string('addr1', 50);
            $table->string('addr2', 50);
            $table->string('addr3', 35, NULL);
            $table->string('addr4', 30, NULL);
            $table->string('npwp', 20);
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
        Schema::dropIfExists('rdct_fundnames');
    }
}
