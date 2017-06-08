<?php

use Illuminate\Database\Seeder;
use App\Tattoo;
class TattoosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $Tattoo1 = new Tattoo;
      $Tattoo1->name = 'Puppy';
      $Tattoo1->color = '#FFFFFF';
      $Tattoo1->category_id = 2;
      $Tattoo1->stock = 60;
      $Tattoo1->picture = '';
      $Tattoo1->save();
    }
}
