<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $authInterface;

    public function __construct(
        AuthInterface $authInterface
    )
    {
        $this->authInterface = $authInterface;
    }

    public function login(LoginRequest $request)
    {
       $data = $this->authInterface->login($request);

       return $data;
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
