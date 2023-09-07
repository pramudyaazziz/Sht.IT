<?php

namespace App\Services\Stats;

use LaravelEasyRepository\Service;
use App\Repositories\Stats\StatsRepository;

class StatsServiceImplement extends Service implements StatsService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(StatsRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function incrementClicks($urlId)
    {
        $this->mainRepository->incrementClicks($urlId);
    }

    public function getTotalClicks($urlId)
    {
        return $this->mainRepository->getTotalClicks($urlId);
    }
}
