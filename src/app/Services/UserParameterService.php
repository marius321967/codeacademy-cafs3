<?php

namespace App\Services;

use App\Models\User;
use UserRepository;

class UserParameterService {

  public function __construct(private UserRepository $userRepository) {
    
  }

  public function getUserName(string $id): string | null {
    $user = $this->userRepository->getUser($id);

    if ($user !== null)
      return $user->name;
    else 
      return null;
  }

  public function getUserEmail(string $id): string | null {
    $user = $this->userRepository->getUser($id);

    if ($user !== null)
      return $user->email;
    else 
      return null;
  }

}