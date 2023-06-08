<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CoingeckoDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Creating database schema
        Schema::create('coingecko_coins', function (Blueprint $table) {
            $table->string('coin_id')->primary();
            $table->string('symbol');
            $table->string('name');
            $table->text('platforms')->nullable();
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
        Schema::dropIfExists('coingecko_coins');
    }
}
