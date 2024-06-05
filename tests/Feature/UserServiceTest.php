<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    // Melakukan Test UserService sudah di registrasi
    private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();

        // mengambil UserService dari Container Service
        $this->userService = $this->app->make(UserService::class);
    }
    
    // Daftarkan pada Bootstrap atau config (app) UserService-nya jika belum
    public function testSample()
    {
        // Test $userService 
        self::assertTrue(true);
    }

    // Test Login User
    public function testLoginSucces()
    {
        self::assertTrue($this->userService->login("Rajak","rahasia"));
    }

    public function testLoginUserFail() 
    {
        self::assertFalse($this->userService->login("ajak","salah"));
    }

    public function testLoginPasswordFail()
    {
        self::assertFalse($this->userService->login("salah","rahasia"));
    }

    
}
