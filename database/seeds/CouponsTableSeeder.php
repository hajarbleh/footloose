<?php

use Illuminate\Database\Seeder;
use App\Coupon;
use Carbon\Carbon;
class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Coupon1 = new Coupon;
        $Coupon1->name = "Bonus anak soleh";
        $Coupon1->code = "D90O1mmg2s";
        $Coupon1->discount = 15;
        $Coupon1->start_date = Carbon::now();
        $Coupon1->expired_date = Carbon::now()->addYear();
        $Coupon1->save();

        $Coupon2 = new Coupon;
        $Coupon2->name = "Bonus juara 1";
        $Coupon2->code = "2017010101";
        $Coupon2->discount = 35;
        $Coupon2->start_date = Carbon::create(2017, 1, 15);
        $Coupon2->expired_date = Carbon::create(2017, 4,15);
        $Coupon2->save();
    }
}
