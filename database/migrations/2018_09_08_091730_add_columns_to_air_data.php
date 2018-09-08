<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToAirData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('air_datas', function(Blueprint $table){
            $table->float('pm10')->nullable();
            $table->float('pm2_5')->nullable();
            $table->float('co')->nullable();
            $table->float('no2')->nullable();
            $table->float('o3')->nullable();
            $table->float('site')->nullable();
            $table->datetime('date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
