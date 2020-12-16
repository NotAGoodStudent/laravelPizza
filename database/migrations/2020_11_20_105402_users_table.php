<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('usersID');
            $table->string('username');
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('email')->unique();
            $table->timestamp('creationDate');
            $table->string('password');
            $table->enum('role', ['Admin', 'PizzaMaker', 'Delivery', 'Client']);
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
