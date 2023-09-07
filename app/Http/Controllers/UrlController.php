<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\Url;
use App\Services\Stats\StatsService;
use App\Services\Url\UrlService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UrlController extends Controller
{
    protected $urlService;
    protected $statsService;

    public function __construct(UrlService $urlService, StatsService $statsService)
    {
        $this->urlService = $urlService;
        $this->statsService = $statsService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('recent-url', [
            'title' => 'My URL',
            'urls' => $this->urlService->getAllUrlUser(auth()->user()->id),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UrlRequest $request): RedirectResponse
    {
        $url = $this->urlService->create($request->except('_token'));

        if ($url) {
            return redirect()->back()->with('result', $url->slug);
        }

        return redirect()->back()->withErrors(['url' => 'Failed to create shortened url']);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug): View
    {
        $url = $this->urlService->getUrl($slug);

        if ($url) {
            $clicks = $this->statsService->getTotalClicks($url->id);

            return view('stats-url', [
                'title' => 'Stats',
                'url' => $url,
                'clicks' => $clicks,
            ]);
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug): RedirectResponse
    {
        $delete = $this->urlService->delete($slug);

        if ($delete) {
            toastr()->success('Url has been delete successfully!', ['timeOut' => 3000, 'positionClass' => 'toast-bottom-left']);
            return redirect()->route('my-url.index');
        }

        toastr()->error('Url has failed to delete!', ['timeOut' => 3000, 'positionClass' => 'toast-bottom-left']);
        return redirect()->back()->withErrors(['url'=> 'Failed to delete url']);
    }

    /**
     * This method is used for redirect to original url
     */
    public function redirect($slug): RedirectResponse
    {
        $url = $this->urlService->getUrl($slug);

        if ($url) {
            $this->statsService->incrementClicks($url->id);
            return Redirect::to($url->original_url);
        }

        abort(404);
    }
}
