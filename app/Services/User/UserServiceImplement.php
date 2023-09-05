<?php

namespace App\Services\User;

use LaravelEasyRepository\Service;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserServiceImplement extends Service implements UserService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(UserRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function auth(array $data)
    {
        return Auth::attempt($data);
    }

    public function register(array $data)
    {
        $user = $this->mainRepository->findByEmail($data['email']);

        // Check var $user if empty, do create user
        if(empty($user))
        {
            $user = (array) [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ];

            return $this->mainRepository->create($user);
        }

        return false;
    }

    public function logout ($request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return true;
    }
}
