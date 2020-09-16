<?php

namespace Database\Factories;

use App\Models\Statistic;
use App\Models\User;
use App\Models\Link;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StatisticFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Statistic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'=>\Ramsey\Uuid\Uuid::uuid4()->toString(),
            'user_id'=>User::all()->random(1)->first(),
            //'user_id'=>User::factory()->make(),
            'link_id'=>Link::all()->random(1)->first(),
            //'link_id'=>Link::factory()->make(),
            'user_agent'=>$this->faker->userAgent,
            'ip'=> $this->faker->ipv4,
        ];
    }
}
