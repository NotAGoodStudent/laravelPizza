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
            $table->string('ing1')->nullable();;
            $table->string('ing2')->nullable();;
            $table->string('ing3')->nullable();;
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
