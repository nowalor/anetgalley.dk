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

        if(!auth()->attempt($validated)) {
            return redirect()->back()
                ->withInput($validated)
                ->withErrors([
                    'password' => 'Password does not match the email',
                ]);
        }

        return redirect()->route('admin.products.index');
    }

    public function logout(Request $request)
    {
       $request->session()->invalidate();
       $request->session()->regenerateToken();

       return redirect('/login');
    }
}
