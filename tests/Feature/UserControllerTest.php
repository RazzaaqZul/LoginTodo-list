<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    // check halaman login
    public function testLoginPage()
    {
        $this->get('/login')
        ->assertSeeText('Login');
    }

    // Jika sudah login, langsung redirect ke "/"
    public function testLoginPageForMember()
    {
        $this->withSession([
            'user'=> 'Rajak',
        ])->get('/login')
        ->assertRedirect('/');
    }

    // Test login success
    public function testLoginSuccess()
    {
        $this->post('/login', [
            "user"=> "Rajak",
            "password"=> "rahasia",
        ])->assertRedirect("/")
        ->assertSessionHas("user", "Rajak");
    }

    // User tidak perlu login lagi
    public function testLoginForUserAlreadyLogin()
    {
        
        $this->withSession([
            'user'=> 'Rajak',
        ])->post('/login', [
            "user"=> "Rajak",
            "password"=> "rahasia",
        ])->assertRedirect("/")
        ->assertSessionHas("user", "Rajak");
    }

    public function testLoginValidationError()
    {
        $this->post("/login",[])
        ->assertSeeText("User or password is required");
    }

    public function testLoginFailed()
    {
        $this->post("/login",[
            "user"=> "wrong",
            "password"=> "wrong",
        ])->assertSeeText("User or password is wrong");
    }


    public function testLogout(){
        $this->withSession([
            'user'=>"rajak"
        ])->post('/logout')
        ->assertRedirect('/')
        ->assertSessionMissing('user');
    }

    // Test Logout Guest
    public function testLogoutGuest()
    {
        $this->post('/logout')
        ->assertRedirect('/');
    }
}
