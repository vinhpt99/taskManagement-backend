<?php 
namespace App\Http\Controllers;

use App\Services\UserService;

class UserController extends Controller {
    protected $userServive;

    public function __construct(UserService $userService)
    {
      $this->userServive = $userService;
    }

    public function index() {
      $user = $this->userServive->getAllUsers();
      dd($user);
    }
}