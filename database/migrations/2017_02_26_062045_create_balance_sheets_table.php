<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBalanceSheetsTable extends Migration {

    public function up()
    {
        Schema::create('balance_sheets', function(Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->integer('balance');
            $table->integer('organiser_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->boolean('is_canceled');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('balance_sheets');
    }
}