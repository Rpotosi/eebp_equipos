<?php

namespace App\Http\Controllers;


use App\Models\Administrativo;
use App\Models\Distribucion;
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
        return view("Administrativo.Admin-create-vehiculo");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_vehiculo(Request $request)
    {     
        // Crea una nueva instancia de Administrativo
        $vehiculo = new Administrativo();
        // Asigna los valores de los campos de la orden utilizando los datos del formulario
        $vehiculo->placa = $request->placa;
        $vehiculo->linea = $request->linea;
        $vehiculo->clase = $request->clase;
        $vehiculo->marca = $request->marca;
        $vehiculo->color = $request->color;
        $vehiculo->chasis = $request->chasis;
        $vehiculo->motor = $request->motor;
        $vehiculo->cilindraje = $request->cilindraje;
        $vehiculo->uso_vehiculo = $request->uso_vehiculo;
        $vehiculo->modelo =$request->modelo;
        $vehiculo->fecha = $request->fecha;
        $vehiculo->fecha_tecnomecanica =$request->fecha_tecnomecanica;
        $vehiculo->licencia =$request->licencia;
        $vehiculo->tipo_direccion =$request->tipo_direccion;
        $vehiculo->tipo_transmision =$request->tipo_transmision;
        $vehiculo->numero_velocidades =$request->numero_velocidades;
        $vehiculo->tipo_rodamiento =$request->tipo_rodamiento;
        $vehiculo->suspencion_delantera =$request->suspencion_delantera;
        $vehiculo->suspension_trasera =$request->suspension_trasera;
        $vehiculo->numero_llantas =$request->numero_llantas;
        $vehiculo->dimensiones_rines =$request->dimensiones_rines;
        $vehiculo->material_rines =$request->material_rines;
        $vehiculo->tipo_frenos_delanteros = $request->tipo_frenos_delanteros;
        $vehiculo->tipo_frenos_traseros = $request->tipo_frenos_traseros;
        $vehiculo->numero_serie = $request->numero_serie;
        $vehiculo->numero_ventanas = $request->numero_ventanas;
        $vehiculo->capacidad_carga = $request->capacidad_carga;

         // Recuperar los valores seleccionados de las casillas de verificación como un arreglo
         $dotacion = $request->input('dotacion');
         // Convertir el arreglo a una cadena separada por comas
         $dotacion = implode(",", $dotacion);
         $vehiculo->dotacion = $dotacion;

        // Recuperar los valores seleccionados de las casillas de verificación como un arreglo
        $equipo_carretera = $request->input('equipo_carretera');
        // Convertir el arreglo a una cadena separada por comas
        $equipo_carretera = implode(",", $equipo_carretera);
        $vehiculo->equipo_carretera = $equipo_carretera;
      
         
        // Guardar la orden en la base de datos
        $vehiculo->save();    

        // Muestra un mensaje de éxito en la sesión
        session()->flash('success', 'Orden creada exitosamente');

        // Redirecciona a la página anterior
        return back();         
    }  
    
    public function create_equipo()
    {
        return view("Administrativo.Admin-create-vehiculo");
    }


    public function store_equipo(Request $request)
    {     
        // Crea una nueva instancia del controlador Distribucion
        $equipo=new Distribucion();
       
         $equipo->nombre_equipo = $request->nombre_equipo;
         $equipo->ubicacion_equipo = $request->ubicacion_equipo;
         $equipo->estado = $request->estado;
         $equipo->fecha_fabrica = $request->fecha_fabrica;
         $equipo->marca = $request->marca;
         $equipo->modelo = $request->modelo;
         $equipo->no_serie = $request->no_serie;
         $equipo->no_lote = $request->no_lote;
         $equipo->no_activo = $request->no_activo;
         $equipo->codigo =$request->codigo;
         $equipo->fecha_ensayo = $request->fecha_ensayo;
         $equipo->validez= $request->validez ;
         $equipo->fecha_conformidad= $request->fecha_conformidad;
         $equipo->fecha_operacion= $request->fecha_operacion;
         $equipo->nombre_responsable =$request->nombre_responsable;
         $equipo->cargo= $request->cargo;
         $equipo->lugar_proceso= $request->lugar_proceso;
         $equipo->fecha_entrega= $request->fecha_entrega;
         $equipo->observacion_responsable= $request->observacion_responsable;
         $equipo->fabricante = $request->fabricante;
         $equipo->fecha_adquisicion = $request->fecha_adquisicion;
         $equipo->nombre_proveedor= $request->nombre_proveedor;
         $equipo->direccion_proveedor = $request->direccion_proveedor;
         $equipo->email_proveedor = $request->email_proveedor;
         $equipo->telefono_proveedor = $request->telefono_proveedor;
         $equipo->catalogo = $request->catalogo;
         $equipo->mantenimiento_recomendado = $request->mantenimiento_recomendado;
         $equipo->condiciones_operacion = $request->condiciones_operacion;
         $equipo->observacion_fabricante = $request->observacion_fabricante;
         $equipo->medicion = $request->medicion;
         $equipo->rango_uso = $request->rango_uso;
         $equipo->resolucion = $request->resolucion;
         $equipo->exactitud = $request->exactitud;
         $equipo->fecha_calibracion= $request->fecha_calibracion;
         $equipo->fecha_verificacion= $request->fecha_verificacion;
         $equipo->patrones=$request->patrones;
         $equipo->estandares=$request->estandares;
         $equipo->regulaciones=$request->regulaciones;
         $equipo->otras_caracteristicas = $request->otras_caracteristicas;
         $equipo->garantia = $request->garantias;
         $equipo->fecha_inicio = $request->fecha_inicio;
         $equipo->fecha_fin =$request->fecha_fin;

        
         $equipo->save();    

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
