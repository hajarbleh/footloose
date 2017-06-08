<?php

use Illuminate\Database\Seeder;
use App\Base;
class BasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Base1 = new Base;
        $Base1->name = 'Free flop green base';
        $Base1->color = '#00FF00';
        $Base1->size = 36;
        $Base1->category_id = 2;
        $Base1->stock = 60;
        $Base1->picture = '';
        $Base1->save();

        $Base2 = new Base;
        $Base2->name = 'Free flop green base';
        $Base2->color = '#00FF00';
        $Base2->size = 37;
        $Base2->category_id = 2;
        $Base2->stock = 50;
        $Base2->picture = '';
        $Base2->save();


    }
}
