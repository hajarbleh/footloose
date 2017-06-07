<?php

use Illuminate\Database\Seeder;
use App\TransactionDetail;

class TransactionDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$TransactionDetail1 = new TransactionDetail;
    	$TransactionDetail1->base_id = 1;
    	$TransactionDetail1->strap_id = 1;
      $TransactionDetail1->tattoo_id = 1;
    	$TransactionDetail1->transaction_id = 1;
    	$TransactionDetail1->quantity = 3;

    	$TransactionDetail2 = new TransactionDetail;
    	$TransactionDetail2->base_id = 2;
    	$TransactionDetail2->strap_id = 1;
      $TransactionDetail2->tattoo_id = 1;
    	$TransactionDetail2->transaction_id = 2;
    	$TransactionDetail2->quantity = 2;


    }
}