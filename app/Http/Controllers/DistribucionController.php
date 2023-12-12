<?php

namespace App\Http\Controllers;

use App\Models\Distribucion;
use App\Models\User;
use App\Models\MantenimientoEquipoDis;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class DistribucionController extends Controller
{
    /** INICIA LOS METODOS PARA EQUIPOS DISTRIBUCION **/


    private function getCurrentUser()
    {
        // Busca y devuelve el objeto de usuario correspondiente al id del usuario actualmente autenticado
        return User::find(Auth::user()->id);
    }
    

    public function show_form()
    {
         // Obtiene el usuario actual, y lo guarda en la variable $user
         $user = $this->getCurrentUser();
        // Pasar el usuario a la vista 
        return view('Distribucion.Dis-create-form',compact('user'));
    }

    public function show_equipo(Request $request)
    {
        $user = $this->getCurrentUser();
        //busca el equipo por nombre_equipo
        $buscarpor = $request->input('nombre_equipo');
        // Crea una consulta del modelo Distribucion
        $query = Distribucion::query();   

        $query->where('nombre_equipo', 'like', '%' .$buscarpor . '%');
        // Ejecutamos la consulta y obtenemos los pedidos filtrados

        $equipos = $query->paginate(8);

        return view ('Distribucion.Dis-show', compact('equipos','buscarpor','user'));
    }

    public function show_equipo_CV(Request $request, $id_equipo)
    {
         // Obtiene el usuario actual, y lo guarda en la variable $user
         $user = $this->getCurrentUser();
        // Busca el equipo correspondiente al id proporcionado
        $equipo = Distribucion::find($id_equipo);
        // Trae todos los registros de la tabla mantenimientoVehiculo
        $query = MantenimientoEquipoDis::query(); 

        // Ejecutamos la consulta y obtenemos los pedidos filtrados
        $mantenimientos = $query->paginate();

        // Devuelve la vista con los datos 
        return view('Distribucion.Dis-show-CV-equipo', compact('equipo', 'mantenimientos', 'user'));

    }

    public function create_equipo()
    {
         // Obtiene el usuario actual, y lo guarda en la variable $user
         $user = $this->getCurrentUser();
         
        return view("Distribucion.Dis-create-equipo", compact('user'));
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
        // Muestra un mensaje de éxito en la sesión si el equipo se guardò en la baase de datos
         session()->flash('success', 'Equipo creado exitosamente ⚙️ ');

        // Redirecciona a la página anterior
         return back();         
    }  

    

    /**
     * Show the form for editing the specified resource.
     */
    public function create_mantenimiento_equipo($id_equipo)
    {
         // Obtiene el usuario actual, y lo guarda en la variable $user
         $user = $this->getCurrentUser();
        
        // Busca el equipo correspondiente al id proporcionado
        $equipo = Distribucion::find($id_equipo);
        
        // Devuelve la vista con los datos 
        return view('Distribucion.Dis-update-equipo', compact('equipo','user'));
    }


    public function store_mantenimiento_equipo(Request $request, $id)
    {

        // Valida los datos del formulario
        $request->validate([
            'fecha_mantenimiento' => 'required|date',
            'descripcion' => 'required|string',
            'tipo_procedimiento' => 'required|string',
            'responsable' => 'required|string',
            'laboratorio_empresa' => 'required|string',
            'observaciones' => 'required|string',
            'anexos' => 'required|file', // Validación adicional para el archivo adjunto
        ]);
    
        // Obtén el vehículo por su ID
        $equipo = Distribucion::findOrFail($id);
    
        // Crea un nuevo mantenimiento
        $mantenimiento = new MantenimientoEquipoDis([
            'fecha_mantenimiento' => $request->input('fecha_mantenimiento'),
            'descripcion' => $request->input('descripcion'),
            'tipo_procedimiento' => $request->input('tipo_procedimiento'),
            'responsable' => $request->input('responsable'),
            'laboratorio_empresa' => $request->input('laboratorio_empresa'),
            'observaciones' => $request->input('observaciones'),
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
        return redirect()->route('distribucion.create_mantenimiento_equipo', $id)->with('success', 'Mantenimiento agregado exitosamente.☑️');
    }

    
}
