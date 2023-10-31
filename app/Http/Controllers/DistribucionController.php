<?php

namespace App\Http\Controllers;

use App\Models\Distribucion;
use Illuminate\Http\Request;

class DistribucionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function form()
    {
        // Pasar el usuario a la vista 
        return view('Distribucion.Dis-create-form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_equipo()
    {
        return view("Distribucion.Dis-create-equipo");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_equipo(Request $request)
    {     
        // Crea una nueva instancia del controlador Distribucion
         $equipo = new Distribucion();
       
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
        session()->flash('success', 'Equipo creado exitosamente ⚙️ ');

        // Redirecciona a la página anterior
        return back();         
    }  

    /**
     * Display the specified resource.
     */
    public function show_equipo(Request $request)
    {

        // Crea una consulta del modelo Distribucion
        $query = Distribucion::query();   

        // Ejecutamos la consulta y obtenemos los pedidos filtrados
        $equipos = $query->paginate(3);

        return view ('Distribucion.Dis-show', compact('equipos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Distribucion $distribucion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Distribucion $distribucion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Distribucion $distribucion)
    {
        //
    }
}
