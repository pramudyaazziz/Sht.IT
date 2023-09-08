<?php

namespace App\Repositories\Url;

use LaravelEasyRepository\Repository;

interface UrlRepository extends Repository{

    public function create($data);
    public function update($url, $data);
    public function getAllUrlUser($userId);
    public function findUrlBySlug($slug);
}
