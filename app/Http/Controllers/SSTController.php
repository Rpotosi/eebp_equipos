<?php

namespace App\Http\Controllers;

use App\Models\SST;
use App\Models\User;
use App\Models\Administrativo;
use App\Models\Administrativo_vehiculo;
use App\Models\Distribucion;
use App\Models\MantenimientoEquipoSst;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SSTController extends Controller
{

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
        return view('SST.SST-create-form', compact('user'));
    }

    public function show_equipo(Request $request)
    {
        // Obtiene el usuario actual, y lo guarda en la variable $user
        $user = $this->getCurrentUser();
        // Obtenemos el valor de búsqueda por nombre_equipo
        $buscarpor = $request->input('nombre_equipo');
        // Crea una consulta del modelo SST
        $query = SST::query();

        // Agregamos una cláusula where para buscar nombre_equipo
        $query->where('nombre_equipo', 'like', '%' . $buscarpor . '%');

        // Ejecutamos la consulta y obtenemos los pedidos filtrados
        $equipos = $query->paginate(5);

        return view ('SST.SST-show', compact('equipos', 'buscarpor','user'));
    }


    public function show_equipo_CV(Request $request, $id_equipo)
    {
        // Obtiene el usuario actual
        $user = $this->getCurrentUser();

        // Busca el equipo por ID
        $equipo = SST::find($id_equipo);

        // Obtiene los mantenimientos del equipo, paginados
        $mantenimientos = $equipo->mantenimientos()->paginate(5);

        // Devuelve la vista con los datos
        return view('SST.SST-show-CV-equipo', compact('equipo', 'mantenimientos','user'));
    }

    public function create_equipo()
    {
        // Obtiene el usuario actual, y lo guarda en la variable $user
        $user = $this->getCurrentUser();
        return view("SST.SST-create-equipo",compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_equipo(Request $request)
    {
        // Crea una nueva instancia del controlador Distribucion
         $equipo = new SST();

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
         $equipo->proveedor = $request->proveedor;
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
         $equipo->garantia = $request->garantia;
         $equipo->fecha_inicio = $request->fecha_inicio;
         $equipo->fecha_fin =$request->fecha_fin;

          // Lógica para cargar la img adjunta
        $file = $request->file('img_sst');
        $extension = $file->getClientOriginalExtension();
        $uniqueFileName = uniqid() . '.' . $extension;
        $path = $file->storeAs('public/equipo_sst/img', $uniqueFileName);

        // Almacena la imagén en la base de datos
        $url = '/storage/equipo_sst/img/' . $uniqueFileName;
        $equipo->img_sst = $url;

        $equipo->save();
        // Muestra un mensaje de éxito en la sesión
        session()->flash('success', 'Equipo creado exitosamente ⚙️ ');

        // Redirecciona a la página anterior
        return back();
    }

    public function create_mantenimiento_equipo($id_equipo)
    {
        // Obtiene el usuario actual, y lo guarda en la variable $user
        $user = $this->getCurrentUser();
        // Busca la orden correspondiente al id proporcionado
        $equipo = SST::find($id_equipo);
        // Devuelve la vista con los datos
        return view('SST.SST-update-equipo', compact('equipo','user'));
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
        $equipo = SST::findOrFail($id);

        // Crea un nuevo mantenimiento
        $mantenimiento = new MantenimientoEquipoSst([
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
        $path = $file->storeAs('public/mantenimientos_equipo_sst/anexos', $uniqueFileName);

        // Almacena la URL del archivo en la base de datos
        $url = '/storage/mantenimientos_equipo_sst/anexos/' . $uniqueFileName;
        $mantenimiento->anexos = $url;

        // Asocia el mantenimiento al vehículo
        $equipo->mantenimientos()->save($mantenimiento);

        // Redirecciona con una alerta de éxito
        return redirect()->route('sst.create_mantenimiento_equipo', $id)->with('success', 'Mantenimiento agregado exitosamente. ☑️ ');
    }
}
