<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Category1 = new Category;
        $Category1->name = 'Men';
        $Category1->is_enabled = false;

        $Category2 = new Category;
        $Category2->name = 'Women';
        $Category2->is_enabled = true;

        $Category3 = new Category;
        $Category3->name = 'Kids';
        $Category3->is_enabled = false;
    }
}
