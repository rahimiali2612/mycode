<?php

namespace App\Services\User;

use App\Models\User;
use Exception;

class DeleteService
{
    public function delete($id)
    {
        try {   

            User::find($id)->delete();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}