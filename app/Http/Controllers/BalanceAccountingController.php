<?php

namespace App\Http\Controllers;

use App\Models\BalanceTransaction;
use App\Models\BalanceAccount;
use App\Models\Organiser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\BalanceSheet;
use App\Models\LedgerHelper;
use Validator;

class BalanceAccountingController extends MyBaseController
{

    public function showFullTransactions(Request $request, $organiserId, $activeSheetId = null) {

        $allowed_sorts = ['id', 'posted_date', 'desc', 'balance_account_id', 'credit',  'debit',   'debit' ];
        $searchQuery = $request->get('q');
        $sort_order = $request->get('sort_order') == 'asc' ? 'asc' : 'desc';
        $sort_by = (in_array($request->get('sort_by'), $allowed_sorts) ? $request->get('sort_by') : 'created_at');

        $organiser = Organiser::scope()->findOrFail($organiserId);
        // find account from table `accounts`
        $sheets = BalanceSheet::where('organiser_id', '=', $organiserId)->get();

        if(is_null($activeSheetId)) {
            if($sheets->isEmpty()) {
                $activeSheetId = null;

            }
            else {
                $activeSheetId = $sheets->first()->id;
            }
        }

        if ($searchQuery) {
            $transactions = BalanceTransaction::whereIn('balance_account_id', function ($query) use ($activeSheetId) {
                $query->select('balance_accounts.id')->from('balance_accounts')
                    ->join('balance_sheets', 'balance_accounts.balance_sheet_id', '=', 'balance_sheets.id')
                    ->where('balance_sheet_id', '=', $activeSheetId);
            })->orderBy('balance_transactions.' . $sort_by, $sort_order)
            ->paginate();
        }
        else {
            $transactions = BalanceTransaction::whereIn('balance_account_id', function ($query) use ($activeSheetId) {
                $query->select('balance_accounts.id')->from('balance_accounts')
                    ->join('balance_sheets', 'balance_accounts.balance_sheet_id', '=', 'balance_sheets.id')
                    ->where('balance_sheet_id', '=', $activeSheetId);
            })->orderBy('balance_transactions.' . $sort_by, $sort_order)
                ->paginate();
        }

        $data = [
            'organiser'     => $organiser,
            'sheets'        => $sheets,
            'activeSheetId' => $activeSheetId,
            'transactions'  => $transactions,
            'sort_by'       => $sort_by,
            'sort_order'    => $sort_order,
            'q'             => $searchQuery ? $searchQuery : '',
            'page'          => 'displayTransactions'
        ];

        return view('BalanceAccounting/layout', $data);
    }

    public function manageBalanceSheets(Request $request, $organiserId) {

        $allowed_sorts = ['id', 'name', 'balance', 'user_id', 'is_canceled',  'created_at',   'updated_at' ];
        $searchQuery = $request->get('q');
        $sort_order = $request->get('sort_order') == 'asc' ? 'asc' : 'desc';
        $sort_by = (in_array($request->get('sort_by'), $allowed_sorts) ? $request->get('sort_by') : 'created_at');

        $organiser = Organiser::scope()->findOrFail($organiserId);
        // find account from table `accounts`
        $sheets = BalanceSheet::where('organiser_id', '=', $organiserId)->orderBy('balance_sheets.' . $sort_by, $sort_order)
            ->paginate();

        $data = [
            'organiser'     => $organiser,
            'sheets'        => $sheets,
            'sort_by'       => $sort_by,
            'sort_order'    => $sort_order,
            'q'             => $searchQuery ? $searchQuery : '',
            'page'          => 'manageSheets'
        ];

        return view('BalanceAccounting/layout', $data);
    }

    public function showEditBalanceSheet(Request $request, $organiser_id, $sheetId) {

        $sheet = BalanceSheet::findOrFail($sheetId);
        $users = User::IsRegistered()->get();

        foreach($users as $user) {
            $userList = [$user->id => $user->first_name . ' ' . $user->last_name];
        }

        $data = [
            'sheet'         => $sheet,
            'users'         => $userList,
            'organiser_id'  => $organiser_id
        ];
        return view('BalanceAccounting.Modals.createEditSheet', $data);
    }

    public function postEditBalanceSheet(Request $request, $organiser_id, $sheetId) {

        $rules = [
            'name'      => 'required|unique:balance_sheets,name,'.$request['id'],
            'user_id'   => 'required|exists:users,id',
        ];

        if (!isset($request['is_canceled'])) {
            $request['is_canceled'] = 0;
        }

        $request['organiser_id'] = $organiser_id;

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status'   => 'error',
                'messages' => $validator->messages()->toArray(),
            ]);
        }

        $sheet = BalanceSheet::findOrFail($sheetId);
        $sheet->update($request->all());

        session()->flash('message', 'Successfully Updated Sheet');

        return response()->json([
            'status'      => 'success',
            'id'          => $sheet->id,
            'redirectUrl' => '',
        ]);

    }

    public function showCreateBalanceSheet(Request $request, $organiser_id) {

        $users = User::IsRegistered()->get();

        foreach($users as $user) {
            $userList = [$user->id => $user->first_name . ' ' . $user->last_name];
        }

        $data = [
            'users'         => $userList,
            'organiser_id'  => $organiser_id
        ];
        return view('BalanceAccounting.Modals.createEditSheet', $data);
    }

    public function postCreateBalanceSheet(Request $request, $organiser_id) {

        $sheet = new BalanceSheet;

        $rules = [
            'name'      => 'required|unique:balance_sheets,name',
            'user_id'   => 'required|exists:users,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status'   => 'error',
                'messages' => $validator->messages()->toArray(),
            ]);
        }

        $sheet->is_canceled = 0;
        $sheet->organiser_id = $organiser_id;
        $sheet->balance = 0;
        $sheet->name = $request->get('name');
        $sheet->user_id = $request->get('user_id');

        $sheet->save($request->all());

        session()->flash('message', 'Successfully Created Sheet');

        return response()->json([
            'status'      => 'success',
            'id'          => $sheet->id,
            'redirectUrl' => '',
        ]);
    }

    public function showBalanceAccounts(Request $request, $organiser_id, $sheet_id) {

        $allowed_sorts = ['id', 'name', 'balance', 'user_id', 'is_canceled',  'created_at',   'updated_at' ];
        $searchQuery = $request->get('q');
        $sort_order = $request->get('sort_order') == 'asc' ? 'asc' : 'desc';
        $sort_by = (in_array($request->get('sort_by'), $allowed_sorts) ? $request->get('sort_by') : 'created_at');

        $organiser = Organiser::scope()->findOrFail($organiser_id);
        // find account from table `accounts`
        $sheets = BalanceSheet::where('organiser_id', '=', $organiser_id)->get();

        $accounts = BalanceAccount::where('balance_sheet_id', '=', $sheet_id)->orderBy('balance_accounts.' . $sort_by, $sort_order)
            ->paginate();

        $data = [
            'organiser'     => $organiser,
            'sheets'        => $sheets,
            'currentSheet'  => BalanceSheet::where('id', '=', $sheet_id)->first(),
            'accounts'      => $accounts,
            'sort_by'       => $sort_by,
            'sort_order'    => $sort_order,
            'q'             => $searchQuery ? $searchQuery : '',
            'page'          => 'manageAccounts'
        ];

        return view('BalanceAccounting/layout', $data);
    }

    public function showEditBalanceAccount(Request $request, $organiser_id, $sheetId, $accountId) {

        $account = BalanceAccount::findOrFail($accountId);
        $users = User::IsRegistered()->get();

        foreach($users as $user) {
            $userList = [$user->id => $user->first_name . ' ' . $user->last_name];
        }

        $data = [
            'sheetId'      => $sheetId,
            'users'         => $userList,
            'organiser_id'  => $organiser_id,
            'account'       => $account,
        ];
        return view('BalanceAccounting.Modals.createEditAccount', $data);
    }

    public function postEditBalanceAccount(Request $request, $organiser_id, $sheetId, $accountId) {

        $rules = [
            'name'      => 'required|unique:balance_accounts,name,'.$request['id'],
            'user_id'   => 'required|exists:users,id',
        ];

        if (!isset($request['is_canceled'])) {
            $request['is_canceled'] = 0;
        }

        $request['organiser_id'] = $organiser_id;

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status'   => 'error',
                'messages' => $validator->messages()->toArray(),
            ]);
        }

        $account = BalanceAccount::findOrFail($accountId);
        $account->update($request->all());

        session()->flash('message', 'Successfully Updated Account');

        return response()->json([
            'status'      => 'success',
            'id'          => $account->id,
            'redirectUrl' => '',
        ]);

    }

    public function showCreateBalanceAccount(Request $request, $organiser_id, $sheetId) {

        $users = User::IsRegistered()->get();

        foreach($users as $user) {
            $userList = [$user->id => $user->first_name . ' ' . $user->last_name];
        }

        $data = [
            'users'         => $userList,
            'organiser_id'  => $organiser_id,
            'sheetId'       => $sheetId
        ];
        return view('BalanceAccounting.Modals.createEditAccount', $data);
    }

    public function postCreateBalanceAccount(Request $request, $organiser_id, $sheetId) {

        $account = new BalanceAccount;

        $rules = [
            'name'      => 'required|unique:balance_accounts,name',
            'user_id'   => 'required|exists:users,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status'   => 'error',
                'messages' => $validator->messages()->toArray(),
            ]);
        }

        $account->is_canceled = 0;
        $account->balance_sheet_id = $sheetId;
        $account->balance = 0;
        $account->name = $request->get('name');
        $account->user_id = $request->get('user_id');

        $account->save($request->all());

        session()->flash('message', 'Successfully Created Account');

        return response()->json([
            'status'      => 'success',
            'id'          => $account->id,
            'redirectUrl' => '',
        ]);
    }

    public function showCreateBalanceTransaction(Request $request, $organiser_id, $sheetId) {

        $users = User::IsRegistered()->get();

        foreach($users as $user) {
            $userList = [$user->id => $user->first_name . ' ' . $user->last_name];
        }

        $transactionTypes = ['Income', 'Expense', 'Transfer To Another Account', 'Transfer From Another Account'];


        $data = [
            'users'             => $userList,
            'organiser_id'      => $organiser_id,
            'sheetId'           => $sheetId,
            'transactionTypes'  => $transactionTypes
        ];
        return view('BalanceAccounting.Modals.createEditTransaction', $data);
    }

    public function postCreateBalanceTransaction(Request $request, $organiser_id, $sheetId) {

        $account = new BalanceAccount;

        $rules = [
            'name'      => 'required|unique:balance_accounts,name',
            'user_id'   => 'required|exists:users,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status'   => 'error',
                'messages' => $validator->messages()->toArray(),
            ]);
        }

        $account->is_canceled = 0;
        $account->balance_sheet_id = $sheetId;
        $account->balance = 0;
        $account->name = $request->get('name');
        $account->user_id = $request->get('user_id');

        $account->save($request->all());

        session()->flash('message', 'Successfully Created Account');

        return response()->json([
            'status'      => 'success',
            'id'          => $account->id,
            'redirectUrl' => '',
        ]);
    }


}