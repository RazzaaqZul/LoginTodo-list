<?php

namespace App\Services;

interface UserService
{
    // logic Login
    // Buat Logic Bussiness pada App/Services/Impl/UserServicesImpl 
    function login(string $user, string $password): bool;
    
}