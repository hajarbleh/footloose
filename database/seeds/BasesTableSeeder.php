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
        $base1 = new Base;
        $base1->name="pink";
        $base1->color="#FFFFFF";
        $base1->size=37;
        $base1->category_id=1;
        $base1->stock=100;
        $base1->picture="";
        $base1->save();
        
        $base2 = new Base;
        $base2->name="black";
        $base2->color="#FFFFFF";
        $base2->size=37;
        $base2->category_id=1;
        $base2->stock=100;
        $base2->picture="";
        $base2->save();
    }
}
