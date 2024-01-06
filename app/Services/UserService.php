<?php 
namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserService {
  protected $userRepository;
  
  public function __construct(UserRepositoryInterface $userRepository)
  {
     $this->userRepository = $userRepository;
  }

  public function getAllUsers() {
     return $this->userRepository->getAll();
  }
  
  public function login($credentials) {
      if(Auth::attempt($credentials)) {
         $user = Auth::user();
         if($user instanceof \App\Models\User) {
            $token = $user->createToken('api')->accessToken;
            return response()->json(['token' => $token], 200);
         }
      } else {
         return response()->json(['error' => 'Unauthenticated'], 400);
      }
  }

}