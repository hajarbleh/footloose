<?php

use Illuminate\Database\Seeder;
use App\FFoTM;

class FFoTMsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $FFoTM1 = new FFoTM;
        $FFoTM1->base_id = 1;
        $FFoTM1->strap_id = 1;
        $FFoTM1->tattoo_id = 1;
        $FFoTM1->category_id = 2;
    }
}
