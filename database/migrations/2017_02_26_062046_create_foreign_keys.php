<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('balance_transactions', function(Blueprint $table) {
			$table->foreign('balance_account_id')->references('id')->on('balance_accounts')
						->onDelete('no action')
						->onUpdate('no action');
		});

		Schema::table('balance_accounts', function(Blueprint $table) {
			$table->foreign('balance_sheet_id')->references('id')->on('balance_sheets')
						->onDelete('no action')
						->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::table('balance_transactions', function(Blueprint $table) {
			$table->dropForeign('balance_transactions_balance_account_id_foreign');
		});

		Schema::table('balance_accounts', function(Blueprint $table) {
			$table->dropForeign('balance_accounts_balance_sheet_id_foreign');
		});
	}
}