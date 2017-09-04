<?php

use Illuminate\Database\Seeder;
use App\Strap;
class StrapsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $strap1 = new Strap;
        $strap1->name="pink";
        $strap1->color="#FFFFFF";
        $strap1->size=37;
        $strap1->category_id=1;
        $strap1->stock=100;
        $strap1->picture="";
        $strap1->save();
        
        $strap2 = new Strap;
        $strap2->name="black";
        $strap2->color="#FFFFFF";
        $strap2->size=37;
        $strap2->category_id=1;
        $strap2->stock=100;
        $strap2->picture="";
        $strap2->save();
    }
}
