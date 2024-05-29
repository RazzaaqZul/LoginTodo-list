<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->app->make(UserService::class);
    }
    
    // Daftarkan pada Bootstrap atau config (app) UserService-nya
    public function testSample()
    {
        self::assertTrue(true);
    }

    public function testLoginSucces()
    {
        self::assertTrue($this->userService->login("ajak","rahasia"));
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
