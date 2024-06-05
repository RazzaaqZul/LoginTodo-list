<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    // Depedency Injection
    private UserService $userService;

    // Constructor to initialize the UserService
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
    // function menampilkan halaman login
    public function login() : Response
    {
        // render view
        return response()
        ->view("user.login", [
            "title"=> "Login",
        ]);
    }

    // function untuk login
    public function doLogin(Request $request) : Response|RedirectResponse
    {
        $user = $request->input('user');
        $password = $request->input('password');

        // validate input
        if(empty($user) || empty($password)) {
            return response()->view("user.login", [
                "title"=> "Login",
                "error" => "User or password is required"
            ]);
        }

        // Jika valid
        // Jika password === password di db
        if($this->userService->login($user, $password)) {
            // simpan dlm file
            $request->session()->put("user", $user);
            // redirect ke halaman home
            return redirect("/");
        };

        // Jika gagal
        return response()->view("user.login", [
            "title"=> "Login",
            "error"=> "User or password is wrong"
        ]);

    }

    // function untuk logout
    public function doLogout(Request $request) : RedirectResponse
    {
        // hapus dr session data user
        $request->session()->forget("user");
        return redirect("/");

    }
}
