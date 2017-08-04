<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalanceTransaction extends Model{

    public $timestamps = false;

    public function balanceAccount(){
        return $this->belongsTo('\App\Models\BalanceAccount');
    }









    public function scopeOfBalancAccount($query, $balanceaccount_id)
    {
        return $query->where('balanceaccount_id', $balanceaccount_id);
    }

    public function getTransactionAmountAttribute(){
        return $this->debit ?: -($this->credit);
    }

    public function delete()
    {
        die("Ledger can't be deleted to keep the integrity of its historical data");
    }

    public function save(array $options = []){

        $this->balance = $this->balanceaccount->balance + $this->transaction_amount;

        $saved = parent::save($options);

        if(!$saved) return $saved;

        // update balance in table accounts
        $this->balanceaccount->balance = $this->balance;
        $accountUpdated = $this->account->save();

        return $accountUpdated;
    }

}