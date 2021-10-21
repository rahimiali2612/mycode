<?php

namespace App\Services\User;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UpdateService
{
    public function update($request)
    {
        try {

            User::when($request->has('id'), function ($q) use ($request) {
                $q->where('id', $request->id);
            })
                ->when(!$request->has('id'), function ($q) {
                    $q->where(Auth::user()->id);
                })
                ->update([
                    'name' => $request->name,
                    'email' => $request->email
                ]);

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
