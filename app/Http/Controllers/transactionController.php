<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use Carbon\Carbon;

class transactionController extends Controller
{
    public function toBankSuccess()
    {
        return view('/transactionsuccess');
    }

    public function toBankFailed()
    {
        return view('/transfer-to-bank');
    }

    // Retrieve transactions from wallets and transactions collections
    public static function getTransactionsHistory($wallet, $bank) {

        $history = collect();
        $wallet->each(function($wallet) use ($history) {
            // dd($wallet->toArray());
            // Wallet to wallet
            $history->push(collect([
                'transaction_type' => 'Wallet',
                'transaction_date' => $wallet->created_at->toFormattedDateString(),
                'transaction_amount' => $wallet->amount_transfered,
                'transaction_status' => $wallet->transaction_status
            ]));
        });

        $bank->each(function($bank) use ($history) {
            $history->push(collect([
                'transaction_type' => 'Bank',
                'transaction_date' => $bank->created_at->toFormattedDateString(),
                'transaction_amount' => $bank->amount,
                'transaction_status' => $bank->transaction_status
            ]));
        });

        return $history;
    }
}
