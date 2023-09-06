<?php

namespace App\Services\Url;

use LaravelEasyRepository\BaseService;

interface UrlService extends BaseService{

    public function create($data);
    public function getTitleUrl($url);
    public function getAllUrlUser($userId);
}
