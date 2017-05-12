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
        $Transaction1->transaction_code ='005071102';
        $Transaction1->users_id = 1;
        $Transaction1->coupons_id ='';
        $Transaction1->total = 267000;
        $Transaction1->transaction_status ='Lunas';
        $Transaction1->timestamp = Carbon::now();
        


        $Transaction2 = new Transaction;
        $Transaction2->transaction_code ='005071202';
        $Transaction2->users_id = 2;
        $Transaction2->coupons_id = 2;
        $Transaction2->total = 178000;
        $Transaction2->transaction_code = 'Pending';
        $Transaction2->timestamp = Carbon::create(2017, 5, 16, 16, 0, 0);

    }
}
