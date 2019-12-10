<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('father_lastname');
            $table->string('mother_lastname');
            $table->string('state');
            $table->string('unity');
            $table->string('job');
            $table->string('character');
            $table->string('reason');
            $table->string('position');
            $table->string('email')->length(191)->unique();
            $table->timestamp('email_verified_at')->length(191)->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->unsignedBigInteger('assignment_id');
            $table->foreign('assignment_id')->references('id')->on('assignments');
            $table->unsignedBigInteger('zone_coordinators');
            $table->foreign('zone_coordinators')->references('id')->on('zone_coordinators');
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
        Schema::dropIfExists('users');
    }
}
