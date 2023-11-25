<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{

   /**
     * Display the specified resource.
     */
    public function show() // Se deja vacio porque no recibe datos
    {
        $user = $this->getCurrentUser();
        // Pasar el usuario a la vista home.home-show
        return view('Home.home', compact('user'));
    }

    private function getCurrentUser()
    {
        // Busca y devuelve el usuario actual basado en su id
        return User::find(Auth::user()->id);
    }
}

