<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BilllineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_line', function (Blueprint $table) {
            $table->bigIncrements('billLineID');
            $table->integer('billID');
            $table->integer('pizzaID')->nullable();
            $table->integer('quantity')->nullable();
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
