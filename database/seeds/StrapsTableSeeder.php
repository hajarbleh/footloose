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
        $Strap1 = new Strap;
        $Strap1->name = 'Red standard strap';
        $Strap1->color = '#FF0000';
        $Strap1->size = 'S';
        $Strap1->category_id = 2;
        $Strap1->stock = 60;
        $Strap1->picture = '';
        $Strap1->save();
    }
}
