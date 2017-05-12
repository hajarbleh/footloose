<?php

use Illuminate\Database\Seeder;
use App\Item;
class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Item1 = new Item;
        $Item1->name = 'Free flop green base';
        $Item1->color = '#00FF00';
        $Item1->size = 36;
        $Item1->type = 'base';
        $Item1->category_id = 2;
        $Item1->stock = 60;
        $Item1->picture = '';

        $Item2 = new Item;
        $Item2->name = 'Free flop green base';
        $Item2->color = '#00FF00';
        $Item2->size = 37;
        $Item2->type = 'base';
        $Item2->category_id = 2;
        $Item2->stock = 50;
        $Item2->picture = '';

        $Item3 = new Item;
        $Item3->name = 'Red standard strap';
        $Item3->color = '#FF0000';
        $Item3->size = 36;
        $Item3->type = 'strap';
        $Item3->category_id = 2;
        $Item3->stock = 60;
        $Item3->picture = '';
        
    }
}
