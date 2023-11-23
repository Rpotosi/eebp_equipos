<?php

namespace App\Http\Controllers;

use App\Models\Distribucion;
use App\Models\MantenimientoEquipoDis;
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
        $buscarpor = $request->input('nombre_equipo');
        // Crea una consulta del modelo Distribucion
        $query = Distribucion::query();   

        $query->where('nombre_equipo', 'like', '%' .$buscarpor . '%');
        // Ejecutamos la consulta y obtenemos los pedidos filtrados
        $equipos = $query->paginate(8);

        return view ('Distribucion.Dis-show', compact('equipos','buscarpor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_equipo($id_equipo)
    {
        
        // Busca la orden correspondiente al id proporcionado
        $equipo = Distribucion::find($id_equipo);
        // Devuelve la vista con los datos 
        return view('Distribucion.Dis-update-equipo', compact('equipo'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update_equipo(Request $request, $id_equipo)
    {
        // Busca la orden correspondiente al id proporcionado
        $equipo = Distribucion::find($id_equipo);

        // Obtener todos los datos enviados en la solicitud
        $input = $request->all();

        // Actualizar la orden con los nuevos datos proporcionados
        $equipo->update($input);
        // Redireccionar a la vista de la página Consultar Orden Empresa (Metodo index según la ruta del archivo web.php)
        return redirect('');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Distribucion $distribucion)
    {
        //
    }


    public function agregarMantenimiento_equipo_dis(Request $request, $id)
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
        $equipo = Distribucion::findOrFail($id);
    
        // Crea un nuevo mantenimiento
        $mantenimiento = new MantenimientoEquipoDis([
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
        return redirect()->route('distribucion.show_equipo', $id)->with('success', 'Mantenimiento agregado exitosamente.');
    }

    public function equipo_dis_CV(Request $request, $id_equipo)
    {
        // Busca la orden correspondiente al id proporcionado
        $equipo = Distribucion::find($id_equipo);
        // Trae todos los registros de la tabla mantenimientoVehiculo
        $query = MantenimientoEquipoDis::query(); 

        // Ejecutamos la consulta y obtenemos los pedidos filtrados
        $mantenimientos = $query->paginate();

        // Devuelve la vista con los datos 
        return view('Distribucion.Dis-show-CV-equipo', compact('equipo', 'mantenimientos'));

    }
}
