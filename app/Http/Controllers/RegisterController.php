<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display register page
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     * 
     * $param RegisterRequest $request
     */

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validate());

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
}
