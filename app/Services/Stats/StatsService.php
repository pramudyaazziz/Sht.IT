<?php

namespace App\Services\Stats;

use LaravelEasyRepository\BaseService;

interface StatsService extends BaseService{

    public function incrementClicks($urlId);
    public function getTotalClicks($urlId);
}
