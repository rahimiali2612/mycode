<?php

namespace App\Services\User;

use App\Models\User;
use Exception;

class ShowService
{
    public function show($id)
    {
        try {

            $data = User::find($id);

            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}