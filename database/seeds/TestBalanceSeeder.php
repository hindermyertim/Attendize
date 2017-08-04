<?php

use Illuminate\Database\Seeder;

class TestBalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $sheets = [
            [
                'id' => 1,
                'name' => 'test sheet',
                'balance' => 100,
                'organiser_id' => 1,
                'user_id' => 1,
                'is_canceled' => 0,
                'created_at' => '2016-06-22 03:22:50',
                'updated_at' => '2016-06-22 03:22:50',
            ],
            [
                'id' => 2,
                'name' => 'another test',
                'balance' => 50,
                'organiser_id' => 1,
                'user_id' => 1,
                'is_canceled' => 0,
                'created_at' => '2016-06-22 03:22:50',
                'updated_at' => '2016-06-22 03:22:50',
            ],
        ];

        DB::table('balance_sheets')->delete();
        DB::table('balance_sheets')->insert($sheets);

        $accounts = [
            [
                'id' => 1,
                'balance_sheet_id' => 1,
                'balance' => 100,
                'name' => 'test account',
                'user_id' => 1,
                'is_canceled' => 0,
                'created_at' => '2016-06-22 03:22:50',
                'updated_at' => '2016-06-22 03:22:50',
            ],
            [
                'id' => 2,
                'balance_sheet_id' => 2,
                'balance' => 50,
                'name' => 'another test account',
                'user_id' => 1,
                'is_canceled' => 0,
                'created_at' => '2016-06-22 03:22:50',
                'updated_at' => '2016-06-22 03:22:50',
            ],
        ];


        DB::table('balance_accounts')->delete();

        DB::table('balance_accounts')->insert($accounts);

        $transactions = [
            [
                'id' => 1,
                'balance_account_id' => 1,
                'debit' => 0,
                'credit' => 150,
                'desc' => 'inital income',
                'secondary_desc' => 'nah',
                'balance' => 150,
                'posted_user_id' => 1,
                'transaction_date' => '2016-06-22',
                'is_canceled' => 0,
                'created_at' => '2016-06-22 03:22:50',
            ],
            [
                'id' => 2,
                'balance_account_id' => 1,
                'debit' => 50,
                'credit' => 0,
                'desc' => 'inital debit',
                'secondary_desc' => 'poop',
                'balance' => 100,
                'posted_user_id' => 1,
                'transaction_date' => '2016-06-23',
                'is_canceled' => 0,
                'created_at' => '2016-06-23 03:22:50',
            ],
            [
                'id' => 3,
                'balance_account_id' => 2,
                'debit' => 0,
                'credit' => 50,
                'desc' => 'another inital debit',
                'secondary_desc' => 'poop2',
                'balance' => 50,
                'posted_user_id' => 1,
                'transaction_date' => '2016-06-23',
                'is_canceled' => 0,
                'created_at' => '2016-06-23 03:22:50',
            ],
        ];

        DB::table('balance_transactions')->delete();
        DB::table('balance_transactions')->insert($transactions);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
