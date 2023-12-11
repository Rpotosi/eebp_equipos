<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Administrativo_vehiculo;
use App\Models\Administrativo_equipo;
use App\Models\MantenimientoVehiculo;
use App\Models\MantenimientoEquipoAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Storage;


class AdministrativoController extends Controller
{

    private function getCurrentUser()
    {
        // Busca y devuelve el objeto de usuario correspondiente al id del usuario actualmente autenticado
        return User::find(Auth::user()->id);
    }
    
    /** INICIA LOS METODOS PARA VEHICULOS ADMINISTRATIVOS **/

    public function show_form()
    {
         // Obtiene el usuario actual, y lo guarda en la variable $user
         $user = $this->getCurrentUser();
        
        // Pasar el usuario a la vista 
        return view('Administrativo.Admin-create-form', compact('user'));
    }

    public function show_vehiculo(Request $request)

    {   // Obtiene el usuario actual, y lo guarda en la variable $user
        $user = $this->getCurrentUser();
        
        // Obtenemos el valor de búsqueda por placa
       $buscarpor = $request->input('placa');

       $estado = $request->input('estado');
    
        // Crea una consulta del modelo Administrativo_vehiculo
        $query = Administrativo_vehiculo::query();
            
        // Agregamos una cláusula where para buscar por placa siempre
        $query->where('placa', 'like', '%' . $buscarpor . '%');
    
        // Ejecutamos la consulta y obtenemos los pedidos filtrados hasta 8 registros
        $vehiculos = $query->paginate(8);
    
        return view('Administrativo.Admin-show-vehiculo', compact('vehiculos', 'buscarpor', 'estado', 'user'));
    }

    public function show_vehiculos_CV(Request $request, $id_vehiculo)
    {   
         // Obtiene el usuario actual, y lo guarda en la variable $user
         $user = $this->getCurrentUser();
        
        // Busca el vehiculo correspondiente al id proporcionado
        $vehiculo = Administrativo_vehiculo::find($id_vehiculo);
        // Trae todos los registros de la tabla mantenimientoVehiculo
        $query = MantenimientoVehiculo::query(); 

        // Ejecutamos la consulta y obtenemos los pedidos filtrados
        $mantenimientos = $query->paginate();

        // Devuelve la vista con los datos 
        return view('Administrativo.Admin-show-CV', compact('vehiculo', 'mantenimientos', 'user'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_vehiculo()
    {
        
         // Obtiene el usuario actual, y lo guarda en la variable $user
         $user = $this->getCurrentUser();
        
        return view("Administrativo.Admin-create-vehiculo", compact('user'));
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store_vehiculo(Request $request)
    {     
        // Crea una nueva instancia del modelo Administrativo_Vehiculo
        $vehiculo = new Administrativo_vehiculo();

        // Asigna los valores de los campos de la vehiculo utilizando los datos del formulario de la vista Admin-create-vehiculo
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
         
        // Guardar Vehiculo en la base de datos
        $vehiculo->save();    

        // Muestra un mensaje de éxito en la sesión si el vehiculo se guardó con exito
        session()->flash('success', 'Vehiculo creado exitosamente 🚗');

        // Redirecciona a la página anterior
        return back();         
    }

    public function create_mantenimiento_vehiculo($id_vehiculo)
    {
         // Obtiene el usuario actual, y lo guarda en la variable $user
         $user = $this->getCurrentUser();
        
        // Busca la vehiculo correspondiente al id proporcionado
        $vehiculo = Administrativo_vehiculo::find($id_vehiculo);

        // Devuelve la vista con los datos quemados "hoja de vida"
        return view('Administrativo.Admin-update-vehiculo', compact('vehiculo','user'));
    }

    public function store_mantenimiento_vehiculo(Request $request, $id)
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
       // session()->flash('success', 'Vehiculo creado exitosamente 🚗');

        return redirect()->route('administrativo.create_mantenimiento_vehiculo', $id)->with('success', 'Mantenimiento agregado exitosamente.');
      
        // Redirecciona a la página anterior   
       // return back();    
    }

    public function show_equipo(Request $request)
    { 
         // Obtiene el usuario actual, y lo guarda en la variable $user
         $user = $this->getCurrentUser();
        
        // Obtenemos el valor de búsqueda por nombre equipo
        $buscarpor = $request->input('nombre_equipo');

        // Crea una consulta del modelo 
        $query = Administrativo_equipo::query();   

        // Agregamos una cláusula where para buscar por placa siempre
        $query->where('nombre_equipo', 'like', '%' . $buscarpor . '%');
        
        // Ejecutamos la consulta y obtenemos los pedidos filtrados
        $equipos = $query->paginate(8);

        return view ('Administrativo.Admin-show-equipo', compact('equipos', 'buscarpor', 'user'));
    }

    public function show_equipo_CV(Request $request, $id_equipo)
    {

         // Obtiene el usuario actual, y lo guarda en la variable $user
         $user = $this->getCurrentUser();
        
        // Busca la equipo correspondiente al id proporcionado
        $equipo = Administrativo_equipo::find($id_equipo);
        // Trae todos los registros de la tabla mantenimientoVehiculo
        $query = MantenimientoEquipoAdmin::query(); 

        // Ejecutamos la consulta y obtenemos los pedidos filtrados
        $mantenimientos = $query->paginate();

        // Devuelve la vista con los datos 
        return view('Administrativo.Admin-show-CV-equipo', compact('equipo', 'mantenimientos', 'user'));

    }
    

    /** INICIO DE LOS METODOS DE EQUIPOS ADMINISTRATIVOS **/

    public function create_equipo()

    {

         // Obtiene el usuario actual, y lo guarda en la variable $user
         $user = $this->getCurrentUser();
        
        return view("Administrativo.Admin-create-equipo", compact('user'));
    }


    public function store_equipo(Request $request)
    {     
        // Crea una nueva instancia del controlador Administrativo_equipo
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
        // Muestra un mensaje de éxito en la sesión si el equipo se guardò en la base de datos
        session()->flash('success', 'Equipo creado exitosamente ⚙️ ');

        // Redirecciona a la página anterior
        return back();         
    }  

    

    public function create_mantenimiento_equipo(Request $request, $id_equipo)
    {

         // Obtiene el usuario actual, y lo guarda en la variable $user
         $user = $this->getCurrentUser();
        
        // Busca el equipo correspondiente al id proporcionado
        $equipo = Administrativo_equipo::find($id_equipo);
        // Devuelve la vista con los datos 

        return view('Administrativo.Admin-update-equipo', compact('equipo', 'user'));

    } 
        
    public function store_mantenimiento_equipo(Request $request, $id)
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
    
        // Obtén el vehículo por su ID del modelo administrativo_equipo
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
    
        // Almacena la URL del archivo en la base de datos en la carpeta storage
        $url = '/storage/mantenimientos/anexos/' . $uniqueFileName;
        $mantenimiento->anexos = $url;
    
        // Asocia el mantenimiento al vehículo
        $equipo->mantenimientos()->save($mantenimiento);
    
        // Redirecciona con una alerta de éxito despues de ejecutarse la ruta 
        return redirect()->route('administrativo.create_mantenimiento_equipo', $id)->with('success', 'Mantenimiento agregado exitosamente.');
    }

    

}
