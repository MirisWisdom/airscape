<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('air_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('long', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->integer('wind_direction')->nullable();
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
        Schema::dropIfExists('air_datas');
    }
}
