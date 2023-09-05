<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\User\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * This method is used to display the login page
     */
    public function login(): View
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    /**
     * This method is used for handle auth request
     */
    public function auth(LoginRequest $request): RedirectResponse
    {
        $auth = $this->userService->auth($request->only(['email', 'password']));

        if ($auth) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors(['auth' => 'Login failed due invalid credentials.'])->withInput();
    }
}
