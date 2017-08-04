<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBalanceTransactionsTable extends Migration {

	public function up()
	{
		Schema::create('balance_transactions', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('balance_account_id')->unsigned();
            $table->integer('balance_account_id_transfer')->unsigned()->nullable();
			$table->integer('debit')->nullable();
			$table->integer('credit')->nullable();
			$table->text('desc');
			$table->text('secondary_desc')->nullable();;
			$table->integer('balance');
            $table->integer('posted_user_id');
            $table->date('transaction_date');
            $table->boolean('is_canceled');
			$table->timestamp('created_at')->default(DB::raw('NOW()'));
		});
	}

	public function down()
	{
		Schema::drop('balance_transactions');
	}
}