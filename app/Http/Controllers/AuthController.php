<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login", [
            "title" => "login"
        ]);
    }

    public function register()
    {
        return view("auth.register", [
            "title" => "register"
        ]);
    }

    public function auth(Request $req): RedirectResponse
    {
        $credentials = $req->validate([
            "email" => "required|email:dns",
            "password" => "required|min:4"
        ]);

        if(Auth::attempt($credentials)) {
            $req->session()->regenerate();
            return redirect("/dashboard/");
        }

        return back()->with("loginError", "login gagal");
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function store(Request $req)
    {
        $validateData = $req->validate([
            "email" => "required|email:dns",
            "name" => "required|max:25|unique:users",
            "password" => "required|min:4"
        ]);
        $validateData["password"] = Hash::make($validateData["password"]);

        User::create($validateData);
        $req->session()->flash("success", "register berhasil!");

        return redirect("/login");
    }
}
