<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    /**
     * Handle account login request
     * 
     * @param LoginRequest $request
     * 
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials));
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user=Auth::getProvider()->retrieveByCredentials($credenttials);

        Auth::login($user);

        return $this->Authenticated($request, $user);
    }
}

