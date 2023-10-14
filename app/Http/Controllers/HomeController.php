<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{

   /**
     * Display the specified resource.
     */
    public function show() // Se deja vacio porque no recibe datos
    {
        return view('home.home');
    }


}
