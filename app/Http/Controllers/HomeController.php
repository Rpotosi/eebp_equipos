<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

     /**
     * Display the specified resource.
     */
    public function show() // Se deja vacio porque no recibe datos
    {
        $user = $this->getCurrentUser();
        // Pasar el usuario a la vista home.home-show
        return view('Home.home', compact('user','user'));
    }

    private function getCurrentUser()
    {
        // Busca y devuelve el usuario actual basado en su id
        return User::find(Auth::user()->id);
    }
}

