<?php

namespace App\Repositories\Url;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Url;

class UrlRepositoryImplement extends Eloquent implements UrlRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Url $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
