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

    private $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    //public function __construct(\App\Models\Statistic $statistic)
    // We can't use this because this record is not stored in database
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $statistic = new \App\Models\Statistic;
        //This works, because all fields are fillable
        $statistic->fill($this->data);
        $statistic->save();
        $link = \App\Models\Link::find($this->data['link_id']);
        $link->count++;
        $link->save();
    }
}
