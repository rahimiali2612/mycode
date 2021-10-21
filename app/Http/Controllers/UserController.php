<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\NewUserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Interfaces\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userInterface;

    public function __construct(
        UserInterface $userInterface
    )
    {
        $this->userInterface = $userInterface;
    }

    public function update(UserUpdateRequest $request)
    {
        $data = $this->userInterface->update($request);

        return $data;
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $data = $this->userInterface->updatePassword($request);

        return $data;
    }

    public function adminUpdate($id)
    {
        $data = $this->userInterface->show($id);

        return $data;
    }

    public function adminDelete($id)
    {
        $data = $this->userInterface->delete($id);

        return $data;
    }

    public function create()
    {
        $data = $this->userInterface->create();

        return $data;
    }

    public function store(NewUserRequest $request)
    {
        $data = $this->userInterface->store($request);

        return $data;
    }

    public function index()
    {
        $data = $this->userInterface->index();

        return $data;
    }
}
