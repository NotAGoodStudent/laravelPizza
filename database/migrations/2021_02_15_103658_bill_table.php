<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('billID');
            $table->integer('userID');
            $table->float('finalPrice')->nullable();
            $table->boolean('paid')->nullable();;
            $table->enum('status', ['Pending', 'Preparing', 'In oven', 'Ready'])->nullable();
            $table->timestamp('creationDate')->nullable();
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
