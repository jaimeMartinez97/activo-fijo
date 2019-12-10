<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('brand');
            $table->string('model');
            $table->text('general_description');
            $table->string('color');
            $table->boolean('given');
            $table->text('vehicle_description')->nullable();
            $table->text('full_description');
            $table->string('supplier');
            $table->string('price');
            $table->unsignedBigInteger('object_expenses_id');
            $table->foreign('object_expenses_id')->references('id')->on('object_expenses');
            $table->unsignedBigInteger('property_types_id');
            $table->foreign('property_types_id')->references('id')->on('property_types');
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
        Schema::dropIfExists('properties');
    }
}
