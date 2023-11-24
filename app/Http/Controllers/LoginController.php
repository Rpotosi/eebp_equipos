<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function show()
    {
             // Verificar si el usuario ya está autenticado
             if(Auth::check()){
                // Redirigir al usuario a la página de inicio si ya está autenticado
                return redirect('home/show');
            }
            // Mostrar la vista de inicio de sesión
            return view('Login.Login');
    }

    /**
     * Update the specified resource in storage.
     */
    public function login(LoginRequest $request){

        // Obtener las credenciales de inicio de sesión del formulario
        $credentials = $request->getCredentials();

        // Validar las credenciales proporcionadas
        if(!Auth::validate($credentials)){
            // Mostrar una alerta de error si las credenciales no son válidas
            session()->flash('error','Usuario o contraseña incorrectos.');
            return redirect()->to('/');
        }
    
        // Recuperar y almacenar el usuario basado en las credenciales
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
    
        // Iniciar sesión con el usuario autenticado
        Auth::login($user);
    
        // Retorna el método autenticate
        return $this->authenticate($request, $user);

    }

    public function authenticate(Request $request, $user){
        // Redirigir al usuario a la página de inicio autenticada
        return redirect('home/show');
    }

}
