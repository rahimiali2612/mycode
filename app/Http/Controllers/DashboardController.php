<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\UserInterface;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $userInterface;

    public function __construct(
        UserInterface $userInterface
    )
    {
        $this->userInterface = $userInterface;
    }

    public function index()
    {
        if(Auth::user()->hasRole('Admin')) {
            return $this->userInterface->index();
        } else {
            return view('dashboard');
        }
    }
}
