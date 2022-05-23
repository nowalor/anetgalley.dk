<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;

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

        if(!$validated || !auth()->attempt($validated)) {
            return redirect()->back();
        }

        return redirect()->route('admin.products.index');
    }
}
