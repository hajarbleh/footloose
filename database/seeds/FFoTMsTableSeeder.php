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
        $FFoTM1->category_id = 2;
        $FFoTM1->save();
        $FFoTM2 = new FFoTM;
        $FFoTM2->base_id = 1;
        $FFoTM2->strap_id = 1;
        $FFoTM2->category_id = 2;
        $FFoTM2->save();
        $FFoTM3 = new FFoTM;
        $FFoTM3->base_id = 1;
        $FFoTM3->strap_id = 1;
        $FFoTM3->category_id = 2;
        $FFoTM3->save();
    }
}
