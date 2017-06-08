<?php

use Illuminate\Database\Seeder;
use App\Transaction;
use Carbon\Carbon;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Transaction1 = new Transaction;
        $Transaction1->transaction_code ='ue8013';
        $Transaction1->user_id = 1;
        $Transaction1->total = 267000;
        $Transaction1->timestamp = Carbon::now();
        $Transaction1->save();

        $Transaction2 = new Transaction;
        $Transaction2->transaction_code ='hfbv27';
        $Transaction2->user_id = 2;
        $Transaction2->coupon_id = 2;
        $Transaction2->total = 178000;
        $Transaction2->timestamp = Carbon::create(2017, 5, 16, 16, 0, 0);
        $Transaction2->save();
    }
}
