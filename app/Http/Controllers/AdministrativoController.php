<?php

namespace App\Http\Controllers;


use App\Models\Administrativo_vehiculo;
use App\Models\Administrativo_equipo;
use App\Models\MantenimientoVehiculo;
use App\Models\MantenimientoEquipoAdmin;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


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

    public function agregarMantenimiento(Request $request, $id)
    {
        // Valida los datos del formulario
        $request->validate([
            'fecha_mantenimiento' => 'required|date',
            'descripcion' => 'required|string',
            'averia_dano' => 'required|string',
            'referencia_repuesto' => 'required|string',
            'responsable' => 'required|string',
            'precio' => 'required|numeric',
            'anexos' => 'required|file', // Validación adicional para el archivo adjunto
        ]);
    
        // Obtén el vehículo por su ID
        $vehiculo = Administrativo_vehiculo::findOrFail($id);
    
        // Crea un nuevo mantenimiento
        $mantenimiento = new MantenimientoVehiculo([
            'fecha_mantenimiento' => $request->input('fecha_mantenimiento'),
            'descripcion' => $request->input('descripcion'),
            'averia_dano' => $request->input('averia_dano'),
            'referencia_repuesto' => $request->input('referencia_repuesto'),
            'responsable' => $request->input('responsable'),
            'precio' => $request->input('precio'),
            // Completa con otros campos del mantenimiento según tu base de datos
        ]);
    
        // Lógica para cargar el archivo adjunto
        $file = $request->file('anexos');
        $extension = $file->getClientOriginalExtension();
        $uniqueFileName = uniqid() . '.' . $extension;
        $path = $file->storeAs('public/mantenimientos/anexos', $uniqueFileName);
    
        // Almacena la URL del archivo en la base de datos
        $url = '/storage/mantenimientos/anexos/' . $uniqueFileName;
        $mantenimiento->anexos = $url;
    
        // Asocia el mantenimiento al vehículo
        $vehiculo->mantenimientos()->save($mantenimiento);
    
        // Redirecciona con una alerta de éxito
        return redirect()->route('show.show', $id)->with('success', 'Mantenimiento agregado exitosamente.');
    }


    public function agregarMantenimiento_equipo(Request $request, $id)
    {
        // Valida los datos del formulario
        $request->validate([
            'fecha_mantenimiento' => 'required|date',
            'descripcion' => 'required|string',
            'averia_dano' => 'required|string',
            'referencia_repuesto' => 'required|string',
            'responsable' => 'required|string',
            'precio' => 'required|numeric',
            'anexos' => 'required|file', // Validación adicional para el archivo adjunto
        ]);
    
        // Obtén el vehículo por su ID
        $equipo = Administrativo_equipo::findOrFail($id);
    
        // Crea un nuevo mantenimiento
        $mantenimiento = new MantenimientoEquipoAdmin([
            'fecha_mantenimiento' => $request->input('fecha_mantenimiento'),
            'descripcion' => $request->input('descripcion'),
            'averia_dano' => $request->input('averia_dano'),
            'referencia_repuesto' => $request->input('referencia_repuesto'),
            'responsable' => $request->input('responsable'),
            'precio' => $request->input('precio'),
            // Completa con otros campos del mantenimiento según tu base de datos
        ]);
    
        // Lógica para cargar el archivo adjunto
        $file = $request->file('anexos');
        $extension = $file->getClientOriginalExtension();
        $uniqueFileName = uniqid() . '.' . $extension;
        $path = $file->storeAs('public/mantenimientos/anexos', $uniqueFileName);
    
        // Almacena la URL del archivo en la base de datos
        $url = '/storage/mantenimientos/anexos/' . $uniqueFileName;
        $mantenimiento->anexos = $url;
    
        // Asocia el mantenimiento al vehículo
        $equipo->mantenimientos()->save($mantenimiento);
    
        // Redirecciona con una alerta de éxito
        return redirect()->route('show-equipo.show_equipo', $id)->with('success', 'Mantenimiento agregado exitosamente.');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store_vehiculo(Request $request)
    {     
        // Crea una nueva instancia de Administrativo
        $vehiculo = new Administrativo_vehiculo();
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
        session()->flash('success', 'Vehiculo creado exitosamente 🚗');

        // Redirecciona a la página anterior
        return back();         
    }  
    
    public function create_equipo()
    {
        return view("Administrativo.Admin-create-equipo");
    }


    public function store_equipo(Request $request)
    {     
        // Crea una nueva instancia del controlador Distribucion
         $equipo = new Administrativo_equipo();
       
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
    public function show_vehiculo(Request $request)
    {
        // Obtenemos el valor de búsqueda por placa
        $buscarpor = $request->input('placa');

        $estado = $request->input('estado');
    
        // Crea una consulta del modelo Administrativo_vehiculo
        $query = Administrativo_vehiculo::query();
            
        // Agregamos una cláusula where para buscar por placa siempre
        $query->where('placa', 'like', '%' . $buscarpor . '%');
    
        // Ejecutamos la consulta y obtenemos los pedidos filtrados
        $vehiculos = $query->paginate(3);
    
        return view('Administrativo.Admin-show-vehiculo', compact('vehiculos', 'buscarpor', 'estado'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */

    public function edit_vehiculo($id_vehiculo)
    {
        
        // Busca la orden correspondiente al id proporcionado
        $vehiculo = Administrativo_vehiculo::find($id_vehiculo);
        // Devuelve la vista con los datos 
        return view('Administrativo.Admin-update-vehiculo', compact('vehiculo'));
    }


    public function vehiculos_CV(Request $request, $id_vehiculo)
    {
        // Busca la orden correspondiente al id proporcionado
        $vehiculo = Administrativo_vehiculo::find($id_vehiculo);
        // Trae todos los registros de la tabla mantenimientoVehiculo
        $query = MantenimientoVehiculo::query(); 

        // Ejecutamos la consulta y obtenemos los pedidos filtrados
        $mantenimientos = $query->paginate();

        // Devuelve la vista con los datos 
        return view('Administrativo.Admin-show-CV', compact('vehiculo', 'mantenimientos'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_vehiculo)
    {
        // Busca la orden correspondiente al id proporcionado
        $vehiculo = Administrativo_vehiculo::find($id_vehiculo);

        // Obtener todos los datos enviados en la solicitud
        $input = $request->all();

        // Actualizar la orden con los nuevos datos proporcionados
        $vehiculo->update($input);
        // Redireccionar a la vista de la página Consultar Orden Empresa (Metodo index según la ruta del archivo web.php)
        return redirect('show-vehiculo');
    }


    public function show_equipo(Request $request)
    {

        // Crea una consulta del modelo Distribucion
        $query = Administrativo_equipo::query();   

        // Ejecutamos la consulta y obtenemos los pedidos filtrados
        $equipos = $query->paginate();

        return view ('Administrativo.Admin-show-equipo', compact('equipos'));
    }


    public function edit_equipo($id_equipo)
    {
        
        // Busca la orden correspondiente al id proporcionado
        $equipo = Administrativo_equipo::find($id_equipo);
        
        // Devuelve la vista con los datos 
        return view('Administrativo.Admin-update-equipo', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_equipo(Request $request, $id_equipo)
    {
        // Busca la orden correspondiente al id proporcionado
        $equipo = Administrativo_equipo::find($id_equipo);

        // Obtener todos los datos enviados en la solicitud
        $input = $request->all();

        // Actualizar la orden con los nuevos datos proporcionados
        $equipo->update($input);
        // Redireccionar a la vista de la página Consultar Orden Empresa (Metodo index según la ruta del archivo web.php)
        return redirect('show-equipo');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrativo_vehiculo $administrativo)
    {
        //
    }
}
