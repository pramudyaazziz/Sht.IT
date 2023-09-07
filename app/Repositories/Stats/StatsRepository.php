<?php

namespace App\Repositories\Stats;

use LaravelEasyRepository\Repository;

interface StatsRepository extends Repository{

    public function incrementClicks($urlId);
    public function getTotalClicks($urlId);
}
