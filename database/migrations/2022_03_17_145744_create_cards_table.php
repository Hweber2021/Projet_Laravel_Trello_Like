<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->bigIncrements('card_id');
            $table->string('name');
            $table->string('label');
            $table->string('description');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('num_list');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('num_list')->references('num_list')->on('lists')->onDelete('cascade');
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
        Schema::dropIfExists('_cards');
    }
}
