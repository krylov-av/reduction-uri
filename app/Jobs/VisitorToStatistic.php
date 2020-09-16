<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class VisitorToStatistic implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $statistic;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    //public function __construct(\App\Models\Statistic $statistic)
    // We can't use this because this record is not stored in database
    public function __construct($statistic)
    {
        //dd($statistic);
        $this->statistic = $statistic;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //print $this->statistic->id;
        echo "123";
        //print "123";
        //var_dump("executing");
        //print_r($this->statistic);
    }
}
