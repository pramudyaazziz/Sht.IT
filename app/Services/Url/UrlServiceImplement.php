<?php

namespace App\Services\Url;

use LaravelEasyRepository\Service;
use App\Repositories\Url\UrlRepository;

class UrlServiceImplement extends Service implements UrlService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(UrlRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
}
