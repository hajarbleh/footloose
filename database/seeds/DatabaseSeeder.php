<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PricesTableSeeder::class);
        $this->call(FAQsTableSeeder::class);
        $this->call(WebDetailsTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
        $this->call(TransactionDetailsTableSeeder::class);
        $this->call(FFoTMsTableSeeder::class);

    }
}
