<?php

use Illuminate\Database\Seeder;
use App\Video;

class WebinarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::firstOrCreate([
            'status' => '1',
            'title' => [
                "en"=>"Webinar Title",
                "ru"=>"Webinar Заглавие",
                "am"=>"Վեբինարի Վերնագիր"
            ],
            'content' => [
                "en"=>"Webinar content",
                "ru"=>"Webinar content",
                "am"=>"Վեբինարի Նկարագրություն"
            ],
            'slug' => 'webinari-vernagir',
            'video_group' => 'webinar',
        ]);
    }
}
