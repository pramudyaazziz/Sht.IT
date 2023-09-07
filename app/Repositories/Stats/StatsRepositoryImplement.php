<?php

namespace App\Repositories\Stats;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Stats;

class StatsRepositoryImplement extends Eloquent implements StatsRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Stats $model)
    {
        $this->model = $model;
    }

    public function incrementClicks($urlId)
    {
        // get stat record
        $stat = $this->model->where('url_id', $urlId)->where('date', now()->format('Y-m-d'))->first();

        // if stat record exist, update increment field clicks
        if($stat){
            return $stat->update(['clicks' => ++$stat->clicks]);
        }

        // if stat did not exist, create record and make field clicks to 1
        $stat = $this->model->create([
            'url_id' => $urlId,
            'date' => now()->format('Y-m-d'),
            'clicks' => 1
        ]);

        return $stat;
    }

    public function getTotalClicks($urlId)
    {
        return $this->model->where('url_id', $urlId)->sum('clicks');
    }
}
