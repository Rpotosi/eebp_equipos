<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->to('/login');
    }
    }


