<?php

namespace Database\Seeders;

use App\Models\Statistic;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Link;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(10)->create();
        //Why we can't use make() on next line?
        $links = Link::factory(10)->create();
        foreach ($users as $user)
        {
            $statistics = Statistic::factory(rand(20,40))
                ->make([
                    //'id'=>\Ramsey\Uuid\Uuid::uuid4()->toString(),
                    'user_id'=>$user->id,
                ])
                ->each(function($statistic) use ($links){
                    $click = ($links->random())->id;
                    $statistic->link_id = $click;
                    $links[($click-1)]->count++;
                    $statistic->id=\Ramsey\Uuid\Uuid::uuid4()->toString();
                    $statistic->save();
                })
            ;
        }
        //($links[3])->count=99;
        foreach ($links as $link)
        {
            $link->save();
        }
    }
}
