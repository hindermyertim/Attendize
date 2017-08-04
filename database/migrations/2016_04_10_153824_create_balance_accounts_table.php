<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBalanceAccountsTable extends Migration {

	public function up()
	{
		Schema::create('balance_accounts', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('balance_sheet_id')->unsigned();
			$table->integer('balance');
			$table->text('name');
            $table->integer('user_id')->nullable();
            $table->boolean('is_canceled');
			$table->timestamps();
		});
	}

	public function down()
	{
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Schema::dropIfExists('balance_accounts');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}
}