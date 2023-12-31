<?php

namespace App\Services\Url;

use LaravelEasyRepository\BaseService;

interface UrlService extends BaseService{

    public function create($data);
    public function update($data, $slug);
    public function delete($slug);
    public function getTitleUrl($url);
    public function getAllUrlUser($userId);
    public function getUrl($slug);
}
