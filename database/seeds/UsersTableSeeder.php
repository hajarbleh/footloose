<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $User1 = new User;
        $User1->email = 'boss@hellofootloose.com';
        $User1->password = bcrypt('Billtano1');
        $User1->name = 'admin';
        $User1->address = 'Jalan Teknik Kimia, Sukolilo, Surabaya';
        $User1->city = 'Surabaya';
        $User1->state = 'Jawa Timur';
        $User1->postal_code = '60293';
		$User1->phone = '08123456789';
        $User1->role = 'Admin';
        $User1->confirmed = 1;
        $User1->save();
    }
}
