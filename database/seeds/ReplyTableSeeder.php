<?php

use App\Models\Like;
use App\Models\Reply;
use App\User;
use Illuminate\Database\Seeder;

class ReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Reply::class, 50)->create()->each(function ($reply) {
           return $reply->likes()->save(factory(Like::class)->make());
        });
    }
}
