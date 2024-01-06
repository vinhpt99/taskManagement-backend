<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;

class AuthController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function login(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        return $this->userService->login($credentials);
    }
}
