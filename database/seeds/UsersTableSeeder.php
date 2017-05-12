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
        $User1->email = 'admin@footloose.com';
        $User1->password = bcrypt('admin');
        $User1->name = 'admin';
        $User1->address = 'Jalan Teknik Kimia, Sukolilo, Surabaya';
        $User1->city = 'Surabaya';
        $User1->state = 'Jawa Timur';
        $User1->postal_code = '60293';
		$User1->phone = '089630303905';
        $User1->role = 'admin';
        $User1->save();

        $User2 = new User;
        $User2->email = 'user@footloose.com';
        $User2->password = bcrypt('user');
        $User2->name = 'John Peter';
        $User2->address = 'Jalan Rungkut Mapan Barat I FC 18 Surabaya';
        $User2->city = 'Surabaya';
        $User2->state = 'Jawa Timur';
        $User2->postal_code = '60293';
		$User2->phone = '089630303906';
        $User2->role = 'user';
        $User2->save();


    }
}
