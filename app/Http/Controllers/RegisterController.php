<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show(){
        return view('auth.register');
    }

    public function register_create(RegisterRequest $request) {
        
        $user = User::create($request->validated());

        return redirect('/')->with('success', 'Cuenta creada exitosamente');
    }
}
