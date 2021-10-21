<?php

namespace App\Repositories;

use App\Interfaces\AuthInterface;
use App\Services\Auth\LoginService;

class AuthRepository implements AuthInterface
{
    protected $loginService;

    public function __construct(
        LoginService $loginService
    )
    {
        $this->loginService = $loginService;
    }

    public function login($request)
    {
        $data = $this->loginService->login($request);

        return $data;
    }
}