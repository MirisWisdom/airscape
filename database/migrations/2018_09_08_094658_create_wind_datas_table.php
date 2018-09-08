<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWindDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wind_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('long', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->float('wind_direction')->nullable();
            $table->float('wind_speed')->nullable();
            $table->float('wind_sigma_theta')->nullable();
            $table->float('air_temperature')->nullable();
            $table->float('pm10')->nullable();
            $table->datetime('date')->nullable();
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
        Schema::dropIfExists('wind_datas');
    }
}
