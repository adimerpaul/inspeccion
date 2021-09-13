<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceSensorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_sensor', function (Blueprint $table) {
            $table->id();
            $table->string('estado')->default('C');
            $table->unsignedBigInteger('sensor_id');
            $table->foreign('sensor_id')->on('sensors')->references('id')->cascadeOnDelete();
            $table->unsignedBigInteger('place_id');
            $table->foreign('place_id')->on('places')->references('id')->cascadeOnDelete();
            $table->unsignedBigInteger('reporte_id');
            $table->foreign('reporte_id')->on('reportes')->references('id');
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
        Schema::dropIfExists('place_sensor');
    }
}
