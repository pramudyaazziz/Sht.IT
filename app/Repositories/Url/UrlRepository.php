<?php

namespace App\Repositories\Url;

use LaravelEasyRepository\Repository;

interface UrlRepository extends Repository{

    public function create($data);
    public function findBySlug($slug);
    public function getAllUrlUser($userId);
}
