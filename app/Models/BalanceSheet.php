<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalanceSheet extends Model{

    protected $fillable = [
        'name',
        'organiser_id',
        'user_id',
        'is_canceled'
    ];

    public function balanceAccounts(){
        return $this->hasMany('\App\Models\BalanceAccount');
    }
    public function owner(){
        return $this->belongsTo('\App\Models\User', 'user_id');
    }









    public function debit($amount, $desc, $created_by = null){
        $ledger        = $this->createLedgerRecord();
        $ledger->debit = $amount;
        $ledger->desc  = $desc;

        if($created_by){
            $ledger->created_by = $created_by;
        }

        return $ledger->save();
    }

    public function credit($amount, $desc, $created_by = null){
        $ledger         = $this->createLedgerRecord();
        $ledger->credit = $amount;
        $ledger->desc   = $desc;

        if($created_by){
            $ledger->created_by = $created_by;
        }

        return $ledger->save();
    }

    public function getPrevBalanceAttribute()
    {
        if($ledger = $this->ledgers()->latest()->take(2)->get())
            return $ledger[1]->balance;

        return null;
    }

    private function createLedgerRecord(){
        $ledger = new BalanceAccountLedger;
        $ledger->balanceaccount_id = $this->id;

        return $ledger;
    }
}