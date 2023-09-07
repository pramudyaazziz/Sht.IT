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
        $stat = $this->model->where('url_id', $urlId)->where('date', now()->format('Y-m-d'))->first();
        if($stat){
            return $stat->update(['clicks' => ++$stat->clicks]);
        }

        return false;
    }
}
