<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PizzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzas', function (Blueprint $table) {
            $table->bigIncrements('pizzaID');
            $table->string('type');
            $table->string('Ing1')->nullable();;
            $table->string('Ing2')->nullable();;
            $table->string('Ing3')->nullable();;
            $table->string('crust')->nullable();
            $table->float('price')->nullable();
            $table->timestamp('creationDate');
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
