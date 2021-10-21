<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Services\User\DeleteService;
use App\Services\User\IndexService;
use App\Services\User\ShowService;
use App\Services\User\StoreService;
use App\Services\User\UpdateService;
use Illuminate\Support\Facades\Auth;
use App\Services\User\UpdatePasswordService;

class UserRepository implements UserInterface
{
    protected $indexService, $updateService, $updatePasswordService, $showService, $deleteService, $storeService;

    public function __construct(
        IndexService $indexService,
        UpdateService $updateService,
        UpdatePasswordService $updatePasswordService,
        ShowService $showService,
        DeleteService $deleteService,
        StoreService $storeService
    )
    {
        $this->indexService = $indexService;
        $this->updateService = $updateService;
        $this->updatePasswordService = $updatePasswordService;
        $this->showService = $showService;
        $this->deleteService = $deleteService;
        $this->storeService = $storeService;
    }

    public function index()
    {
        $data = $this->indexService->index();

        if(Auth::guard('api')->check()) {
            return response()->json($data, 200);
        } else {
            return view('dashboard', compact('data'));
        }
    }

    public function update($request)
    {
        $data = $this->updateService->update($request);

        if($data === true) {
            if(Auth::guard('api')->check()) {
                return response()->json('Updated', 200);
            } else {
                return redirect()->route('dashboard');
            }
        }

        return $data;
    }

    public function updatePassword($request)
    {
        $data = $this->updatePasswordService->updatePassword($request);

        if($data === true) {
            if(Auth::guard('api')->check()) {
                return response()->json('Updated', 200);
            } else {
                return redirect()->route('dashboard');
            }
        }

        return $data;
    }

    public function show($id)
    {
        $data = $this->showService->show($id);

        return view('admin.update', compact('data', 'id'));
    }

    public function delete($id)
    {
        $data = $this->deleteService->delete($id);

        if($data === true) {
            if(Auth::guard('api')->check()) {
                return response()->json('Deleted', 200);
            } else {
                return redirect()->route('dashboard');
            }
        }

        return $data;
    }

    public function store($request)
    {
        $data = $this->storeService->store($request);

        if($data === true) {
            if(Auth::guard('api')->check()) {
                return response()->json('Inserted', 200);
            } else {
                return redirect()->route('dashboard');
            }
        }

        return $data;
    }

    public function create()
    {
        return view('admin.create');
    }
}