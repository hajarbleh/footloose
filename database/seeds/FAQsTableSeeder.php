<?php

use Illuminate\Database\Seeder;
use App\FAQ;
class FAQsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $FAQ = new FAQ;
        $FAQ->body = 'Place some questions and answers here';
    }
}
