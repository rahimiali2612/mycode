<?php

namespace App\Services\Auth;

use Exception;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function login($request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                
                if ($request->wantsJson()) {
                    $token = Auth::user()->createToken('LaravelApi')->accessToken;
                    
                    return response()->json(['token' => $token], 200);
                } else {
                    $request->session()->regenerate();
                    
                    return redirect()->intended('dashboard');
                }
            }

            if (Auth::guard('api')->check()) {
                return response()->json('The provided credentials do not match our records', 400);
            } else {
                return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ]);
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
