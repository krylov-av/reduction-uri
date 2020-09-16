<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Statistic;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Statistic::factory(10)->create();
    }
}
