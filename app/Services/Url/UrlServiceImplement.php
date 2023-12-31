<?php

namespace App\Services\Url;

use App\Repositories\Stats\StatsRepository;
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

    public function update($data, $slug)
    {
        $data['slug'] = Str::slug($data['slug']);
        $url = $this->mainRepository->findUrlBySlug($slug);
        if($this->mainRepository->update($url, $data)) {
            return $this->mainRepository->find($data['id']);
        }

        return false;
    }

    public function delete($slug)
    {
        $url = $this->mainRepository->findUrlBySlug($slug);
        if ($url) {
            $deleteStats = $url->stats()->delete();
            if ($deleteStats) {
                return $url->delete();
            }
         }

        return false;
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
        return $this->mainRepository->findUrlBySlug($slug) === null;
    }

    public function getUrl($slug)
    {
        return $this->mainRepository->findUrlBySlug($slug);
    }

}
