<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)  {
        $incomingFields = $request->validate([
            "email" => ["required", "email", Rule::unique('users','email')],
            "name" => "required",
            "password" => "required"
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        Auth::login($user);
        return redirect('/login');
    }


    public function login(Request $request){
        $incomingFields = $request->validate([
            "email" => ["required", "email"],
            "password" => "required"
        ]);

        if (Auth::attempt($incomingFields)) {
            $request->session()->regenerate();
            return redirect("/");
        } else {
            return redirect("/login");
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
