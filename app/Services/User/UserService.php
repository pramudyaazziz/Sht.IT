<?php

namespace App\Services\User;

use LaravelEasyRepository\BaseService;

interface UserService extends BaseService{
    public function auth (array $data);
    public function register (array $data);
}
