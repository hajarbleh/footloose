<?php

use Illuminate\Database\Seeder;
use App\WebDetail;

class WebDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $WebDetail1 = new WebDetail;
        $WebDetail1->detail_title = 'Facebook';
        $WebDetail1->detail_content = 'https://www.facebook.com/john.s.peter.775';

        $WebDetail2 = new WebDetail;
        $WebDetail2->detail_title = 'Twitter';
        $WebDetail2->detail_content = 'https://www.twitter.com/bukanjohn';

        $WebDetail3 = new WebDetail;
        $WebDetail3->detail_title = 'Instagram';
        $WebDetail3->detail_content = 'https://www.instagram.com/jonh.s.peter';
        
    }
}
