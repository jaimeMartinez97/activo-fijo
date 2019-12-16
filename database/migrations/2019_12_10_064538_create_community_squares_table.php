<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunitySquaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_squares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('UO');
            $table->text('description');
            $table->string('unity_type');
            $table->string('icve_unity_type');
            $table->string('job_type');
            $table->unsignedBigInteger('zone_coordinators_id');
            $table->foreign('zone_coordinators_id')->references('id')->on('zone_coordinators');
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
        Schema::dropIfExists('community_squares');
    }
}
