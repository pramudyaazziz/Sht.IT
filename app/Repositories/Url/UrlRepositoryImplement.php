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

    public function create($data)
    {
        $url = $this->model->create($data);
        $url->stats()->create([
            'date' => now()->format('Y-m-d'),
            'clicks' => 0
        ]);
        return $url;
    }

    public function findBySlug($slug)
    {
        return $this->model->where("slug", $slug)->first();
    }

    public function getAllUrlUser($userId)
    {
        $url = $this->model->where('user_id', $userId)->latest()->get();
        return $url->map(function ($data) {
            return (object) [
                'id' => $data->id,
                'slug' => $data->slug,
                'original_url' => $data->original_url,
                'title' => $data->title,
                'created' => $data->timeAgo,
                'created_at' => $data->created_at
            ];
        });
    }

    public function findUrlBySlug($slug)
    {
        return $this->model->with('stats')->where('slug', $slug)->first();
    }
}
