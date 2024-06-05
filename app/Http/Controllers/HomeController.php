<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function home(Request $request): RedirectResponse
    {
        // jika ada session
        if($request->session()->exists("user")){
            // Jika sudah login
            return redirect("/todolist");
        } else {
            // Jika belum login
            return redirect("/login");
        }
    }
}
