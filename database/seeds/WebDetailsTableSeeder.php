<?php

use Illuminate\Database\Seeder;
use App\WebDetail;

class WebDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $WebDetail1 = new WebDetail;
        $WebDetail1->email = 'admin@footloose.com';
        $WebDetail1->twitter = 'footloose';
        $WebDetail1->line = '@samting';
        $WebDetail1->save();
    }
}
