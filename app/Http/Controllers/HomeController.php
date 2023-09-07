<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        return view("home", [
            'title' => 'Home',
            'user' => auth()->user(),
            'result' => $request->session()->get('result') ?? null
        ]);
    }
}
