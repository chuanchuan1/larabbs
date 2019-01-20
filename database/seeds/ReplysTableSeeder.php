<?php

use App\Models\Reply;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReplysTableSeeder extends Seeder
{
    public function run()
    {
        $userIds = User::all()->pluck('id')->toArray();
        $topicIds = Topic::all()->pluck('id')->toArray();
        $faker = app(Faker\Generator::class);

        $replys = factory(Reply::class)->times(1000)->make()->each(function ($reply, $index) use($userIds, $topicIds, $faker) {
            $reply->user_id = $faker->randomElement($userIds);
            $reply->topic_id = $faker->randomElement($topicIds);
        });

        Reply::insert($replys->toArray());
    }

}