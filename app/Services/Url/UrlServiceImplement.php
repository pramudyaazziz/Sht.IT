<?php

namespace App\Services\Url;

use LaravelEasyRepository\Service;
use App\Repositories\Url\UrlRepository;
use Illuminate\Support\Str;
use GuzzleHttp\Client;

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

    public function create($data)
    {
        $slug = null;

        if (isset($data['slug'])) // user input alias url
        {
            $slug = Str::slug($data['slug']);
        }
        else // user make random alias url
        {
            $slug = Str::random(8);

            // ensure slug is unique
            while (!$this->isSlugUnique($slug)) {
                $slug = Str::random(8);
            }
        }

        // defines the data to be entered into the database
        $url = (array) [
            'slug' => $slug,
            'original_url' => $data['original_url'],
            'title' => $this->getTitleUrl($data['original_url']),
            'user_id' => auth()->user() ? auth()->user()->id : 1
        ];

        return $this->mainRepository->create($url);
    }

    public function getAllUrlUser($userId)
    {
        return $this->mainRepository->getAllUrlUser($userId);
    }

    public function getTitleUrl($url)
    {
        $client = new Client();

        try {
            $response = $client->get($url);
            $html = $response->getBody()->getContents();
            $title = preg_match("/<title>(.*?)<\/title>/i", $html, $matches) ? $matches[1] : 'Untitled';
        } catch (\Exception $e) {
            $title = 'Untitled';
        }


        return $title;
    }

    public function isSlugUnique($slug)
    {
        return $this->mainRepository->findBySlug($slug) === null;
    }

}
