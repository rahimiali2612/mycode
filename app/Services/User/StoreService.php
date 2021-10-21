<?php

namespace App\Services\User;

use App\Models\User;
use Exception;

class StoreService
{
    public function store($request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}