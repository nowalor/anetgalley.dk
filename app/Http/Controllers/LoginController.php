<?php

namespace App\Http\Controllers;
use App\Http\Request\LoginRequest;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        if(!$validated || !Auth::attempt($credentials)) {
            return redirect()->back();
        }



    }
}
