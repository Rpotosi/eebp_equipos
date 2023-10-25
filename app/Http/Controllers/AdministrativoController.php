<?php

namespace App\Http\Controllers;

use App\Models\Administrativo;
use Illuminate\Http\Request;

class AdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function form()
    {
        // Pasar el usuario a la vista 
        return view('Administrativo.Admin-create-form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_vehiculo()
    {
        return view("Administrativo.Admin-create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_vehiculos(Request $request)
    {     
        // Crea una nueva instancia de Order
        $order=new Order();

       
        // Asigna los valores de los campos de la orden utilizando los datos del formulario
        $order->fecha = date('Y-m-d', strtotime($request->fecha));
        $order->placa = $request->placa;
        $order->linea = $request->linea;
        $order->clase = $request->clase;
        $order->marca = $request->marca;
        $order->color = $request->color;
        $order->chasis = $request->chasis;
        $order->motor = $request->motor;
        $order->cilindraje = $request->cilindraje;
        $order->uso_vehiculo = $request->uso_vehiculo;
        $order->modelo =$request->modelo;
        $order->fecha_tecnomecanica =$request->fecha_tecnomecanica;
        $order->licencia =$request->licencia;
        $order->tipo_direccion =$request->tipo_direccion;
        $order->tipo_transmision =$request->tipo_transmision;
        $order->numero_velocidades =$request->numero_velocidades;
        $order->tipo_rodamiento =$request->tipo_rodamiento;
        $order->suspencion_delantera =$request->suspencion_delantera;
        $order->suspension_trasera =$request->suspension_trasera;
        $order->numero_llantas =$request->numero_llantas;
        $order->dimensiones_rines =$request->dimensiones_rines;
        $order->material_rines =$request->material_rines;
        $order->tipo_frenos_delanteros = $request->tipo_frenos_delanteros;
        $order->tipo_frenos_traseros = $request->tipo_frenos_traseros;
        $order->numero_serie = $request->numero_serie;
        $order->numero_ventanas = $request->numero_ventanas;
        $order->capacidad_carga = $request->capacidad_carga;

         // Recuperar los valores seleccionados de las casillas de verificación como un arreglo
         $dotacion = $request->input('dotacion');
         // Convertir el arreglo a una cadena separada por comas
         $dotacion = implode(",", $dotacion);
         $order->dotacion = $dotacion;

        // Recuperar los valores seleccionados de las casillas de verificación como un arreglo
        $equipo_carretera = $request->input('equipo_carretera');
        // Convertir el arreglo a una cadena separada por comas
        $equipo_carretera = implode(",", $equipo_carretera);
        $order->equipo_carretera = $equipo_carretera;
      
        
        $order->fecha_mantenimiento = $request->fecha_mantenimiento;
        $order->descripcion = $request->descripcion;
        $order->averia_dano = $request->averia_dano;
        $order->referencia_repuesto = $request->referencia_repuesto;
        $order->responsable = $request->responsable;
        $order->precio = $request->precio;

        $order->fecha_mantenimiento2 = $request->fecha_mantenimiento2;
        $order->descripcion2 = $request->descripcion2;
        $order->averia_dano2 = $request->averia_dano2;
        $order->referencia_repuesto2 = $request->referencia_repuesto2;
        $order->responsable2 = $request->responsable2;
        $order->precio2 = $request->precio;

        /*$order->orden_fisica = "si";
        $order->estado = "Pendiente";
        */
    
        /*
        // Lógica para cargar el archivo adjunto
        $file = $request->file('file_orden');
        // Obtener la extensión original del archivo
        $extension = $file->getClientOriginalExtension(); 
        // Generar un nombre único para el archivo
        $uniqueFileName = uniqid() . '.' . $extension;
        // Guardar el archivo con el nombre único
        $path = $file->storeAs('public/uploads/order_create', $uniqueFileName);
        $url = Storage::url($path);
        $order->file_orden = $url;
        */
        // Guardar la orden en la base de datos
        $order->save();    

        // Muestra un mensaje de éxito en la sesión
        session()->flash('success', 'Orden creada exitosamente');

        // Redirecciona a la página anterior
        return back();         
    }   


    /**
     * Display the specified resource.
     */
    public function show(Administrativo $administrativo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrativo $administrativo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrativo $administrativo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrativo $administrativo)
    {
        //
    }
}
