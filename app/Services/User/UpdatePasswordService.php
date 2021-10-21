<?php

namespace App\Services\User;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordService
{
    public function updatePassword($request)
    {
        try {

            // User::where('id', $request->id)
            //     ->update([
            //         'password' => bcrypt($request->new_password)
            //     ]);

            User::find(Auth::user()->id)
                ->update(['password' => Hash::make($request->new_password)]);

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
