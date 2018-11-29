<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('username')->unique();
            $table->string('phoneNumber');
            $table->string('dateOfBirth')->nullable();
            $table->string('homeTown')->nullable();
            $table->string('region')->nullable();
            $table->string('houseNumber')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('userType')->default('user');
            $table->string('password');
            $table->string('gender')->nullable();
            $table->boolean('updated')->default(0);
            $table->rememberToken();
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
