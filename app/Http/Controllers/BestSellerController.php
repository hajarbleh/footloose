<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\TransactionDetail;
use App\Transaction;
use App\BestSeller;
use DB;

class BestSellerController extends Controller
{
    public function index(){
        DB::table('best_sellers')->delete();
        $monthNow = Carbon::now()->month;
        $transactions = Transaction::whereMonth('timestamp', '=', $monthNow)->get();
        $bestSellerCandidate = TransactionDetail::whereIn('transaction_id', $transactions)->groupBy('base_id','strap_id')
            ->selectRaw('sum(quantity) as quantity, base_id, strap_id')
            ->get();
        foreach($bestSellerCandidate as $bsc) {
            $bestSeller = new BestSeller();
            $bestSeller->base_id = $bsc->base_id;
            $bestSeller->strap_id = $bsc->strap_id;
            $bestSeller->quantity = $bsc->quantity;
            $bestSeller->save();
        }
        return dd($bestSellerCandidate);

    }
}
