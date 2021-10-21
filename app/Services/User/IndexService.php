<?php

namespace App\Services\User;

use App\Models\User;
use Exception;

class IndexService
{
    public function index()
    {
        try {
            $data = User::all();

            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
