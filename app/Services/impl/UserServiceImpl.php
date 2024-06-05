<?php

namespace App\Services\Impl;

use App\Services\UserService;

class UserServiceImpl implements UserService
{

    // Model/Data User 
   private array $users = [
    // Key => Value
    'Rajak' => 'rahasia'
   ];
   
   function login(string $user, string $password): bool
   {
    // isset() untuk cek null atau tidak
    // Jika tidak ada User 
    if(!isset($this->users[$user])){
        return false;
    }

    // Jika ada, Ambil Password berdasarkan Key-nya
    $correctPassword = $this->users[$user];
    // Melakukan Konfirmasi password
    return $password == $correctPassword;
   }
}