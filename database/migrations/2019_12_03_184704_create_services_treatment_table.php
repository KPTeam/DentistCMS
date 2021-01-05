<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTreatmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_treatment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('treatment_id')->unsigned();
            $table->foreign('treatment_id')->references('id')->on('treatments');
            $table->unsignedBigInteger('services_id')->unsigned();
            $table->foreign('services_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services_treatment');
    }
}
