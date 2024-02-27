<?php

namespace App\Http\Controllers;

use App\Models\Distribucion_interruptor;
use App\Models\MantenimientoEquipoDis_seccionador;
use App\Models\User;
use App\Models\MantenimientoEquipoDis_interruptor;
use App\Models\Distribucion_seccionador;
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



    public function show_equipo_interruptor(Request $request)
    {
        $user = $this->getCurrentUser();
        //busca el equipo por nombre_equipo
        $buscarpor = $request->input('nombre_equipo');
        // Crea una consulta del modelo Distribucion
        $query = Distribucion_interruptor::query();   

        $query->where('nombre_equipo', 'like', '%' .$buscarpor . '%');
        // Ejecutamos la consulta y obtenemos los pedidos filtrados

        $equipos = $query->paginate(8);

        return view ('Distribucion.Dis-show_equipo_interruptor', compact('equipos','buscarpor','user'));
    }


    public function show_equipo_seccionador(Request $request)
    {
        $user = $this->getCurrentUser();
        //busca el equipo por nombre_equipo
        $buscarpor = $request->input('nombre_equipo_sec');
        // Crea una consulta del modelo Distribucion
        $query = Distribucion_seccionador::query();   

        $query->where('nombre_equipo_sec', 'like', '%' .$buscarpor . '%');
        // Ejecutamos la consulta y obtenemos los pedidos filtrados

        $equipos = $query->paginate(8);

        return view ('Distribucion.seccionador.Dis-show_equipo_seccionador', compact('equipos','buscarpor','user'));
    }

 

    public function show_equipo_CV_interruptor(Request $request, $id_equipo)
    {
         // Obtiene el usuario actual, y lo guarda en la variable $user
         $user = $this->getCurrentUser();
        // Busca el equipo correspondiente al id proporcionado
        $equipo = Distribucion_interruptor::findOrFail($id_equipo);

        $mantenimientos = $equipo->mantenimientos()->paginate(5);
      
        // Devuelve la vista con los datos 
        return view('Distribucion.Dis-show-CV-equipo', compact('equipo', 'mantenimientos', 'user'));

    }

    public function show_equipo_CV_seccionador(Request $request, $id_equipo)
    {
         // Obtiene el usuario actual, y lo guarda en la variable $user
         $user = $this->getCurrentUser();
        // Busca el equipo correspondiente al id proporcionado
        $equipo = Distribucion_seccionador::findOrFail($id_equipo);

        $mantenimientos = $equipo->mantenimientos()->paginate(5);
      
        // Devuelve la vista con los datos 
        return view('Distribucion.seccionador.Dis-show-CV-equipo', compact('equipo', 'mantenimientos', 'user'));

    }


    public function create_equipo_interruptor()
    {
         // Obtiene el usuario actual, y lo guarda en la variable $user
         $user = $this->getCurrentUser();
         
        return view("Distribucion.Dis-create-equipo_interruptor", compact('user'));
    }

    

    public function create_equipo_seccionador()
    {
         // Obtiene el usuario actual, y lo guarda en la variable $user
         $user = $this->getCurrentUser();
         
        return view("Distribucion.seccionador.Dis-create-equipo_seccionador", compact('user'));
    }

    
    /**
     * Store a newly created resource in storage.
     */

     public function store_equipo_interruptor(Request $request)
    {
        // Crea una nueva instancia del controlador Distribucion
        $equipo = new Distribucion_interruptor();
        $equipo->nombre_interruptor = $request->nombre_interruptor;
        $equipo->area = $request->area;
        $equipo->subestacion = $request->subestacion;
        $equipo->nivel_tension = $request->nivel_tension;
        $equipo->bahia = $request->bahia;
        $equipo->iua = $request->iua;
        $equipo->fabricante = $request->fabricante;
        $equipo->costo_adquisicion = $request->costo_adquisicion;
        $equipo->fecha_puesta_servicio = $request->fecha_puesta_servicio;
        $equipo->fecha_fabricacion = $request->fecha_fabricacion;
        $equipo->pais_origen = $request->pais_origen;
        $equipo->nombre_equipo = $request->nombre_equipo;
        $equipo->modelo_fabricacion = $request->modelo_fabricacion;
        $equipo->nro_serie_fabricacion = $request->nro_serie_fabricacion;
        $equipo->voltage_aislamiento_nominal = $request->voltage_aislamiento_nominal;
        $equipo->frecuencia_nominal = $request->frecuencia_nominal;
        $equipo->voltage_frequencia_indutrial = $request->voltage_frequencia_indutrial;
        $equipo->voltage_impulso = $request->voltage_impulso;
        $equipo->corrientes_nominal = $request->corrientes_nominal;
        $equipo->corriente_termica = $request->corriente_termica;
        $equipo->corriente_dinamica = $request->corriente_dinamica;
        $equipo->corriente_nominal_cierre = $request->corriente_nominal_cierre;
        $equipo->medio_extincion = $request->medio_extincion;
        $equipo->año_fabricacion = $request->año_fabricacion;
        $equipo->forma_cierre_desconexion = $request->forma_cierre_desconexion;
        $equipo->factor_primer_polo = $request->factor_primer_polo;
        $equipo->secuencia_nominal_maniobra = $request->secuencia_nominal_maniobra;
        $equipo->presion = $request->presion;
        $equipo->acondicionamiento = $request->acondicionamiento;
        $equipo->acondicionamiento_fabricante = $request->acondicionamiento_fabricante;
        $equipo->acondicionamiento_serie = $request->acondicionamiento_serie;
        $equipo->peso_cantidad_carga = $request->peso_cantidad_carga;
        $equipo->c_auxiliares_mando = $request->c_auxiliares_mando;
        $equipo->c_auxiliares_acondicionamiento = $request->c_auxiliares_acondicionamiento;
        $equipo->c_auxiliares_calefaccion = $request->c_auxiliares_calefaccion;
        $equipo->altura_instalacion = $request->altura_instalacion;
        $equipo->clase_temperatura = $request->clase_temperatura;
        $equipo->normas_fabricacion = $request->normas_fabricacion;
        $equipo->nro_ref_catalogo = $request->nro_ref_catalogo;

        // Lógica para cargar la img adjunta
        $file = $request->file('img_interruptor');

        $originalFileName = $file->getClientOriginalName();
  
        $path = $file->storeAs('public/equipo_dis_interruptor/img', $originalFileName);

        // Almacena la imagén en la base de datos
        $url = '/storage/equipo_dis_interruptor/img/' . $originalFileName;
        $equipo->img_interruptor = $url;

        $equipo->save();
        // Muestra un mensaje de éxito en la sesión si el equipo se guardò en la baase de datos
        session()->flash('success', 'Equipo creado exitosamente ⚙️ ');

        // Redirecciona a la página anterior
        return back();
    }

    public function store_equipo_seccionador(Request $request)
    {
        // Crea una nueva instancia del controlador Distribucion
        $equipo = new Distribucion_seccionador();

        $equipo->nombre_activo_sec = $request->nombre_activo_sec;
        $equipo->area_sec = $request->area_sec;
        $equipo->subestacion_sec = $request->subestacion_sec;
        $equipo->nivel_tension_sec = $request->nivel_tension_sec;
        $equipo->bahia_sec = $request->bahia_sec;
        $equipo->iua_sec = $request->iua_sec;
        $equipo->fabricante_sec = $request->fabricante_sec;
        $equipo->costo_adquisicion_sec = $request->costo_adquisicion_sec;
        $equipo->fecha_puesta_servicio_sec = $request->fecha_puesta_servicio_sec;
        $equipo->pais_origen_sec = $request->pais_origen_sec;
        $equipo->img_sec = $request->img_sec;

        $equipo->nombre_equipo_sec = $request->nombre_equipo_sec;
        $equipo->modelo_fabricacion_sec = $request->modelo_fabricacion_sec;
        $equipo->nro_serie_fabricacion_sec = $request->nro_serie_fabricacion_sec;
        $equipo->fecha_fabricacion_sec = $request->fecha_fabricacion_sec;
        $equipo->volt_aislto_nominal_sec = $request->volt_aislto_nominal_sec;
        $equipo->frecuencia_nominal_sec = $request->frecuencia_nominal_sec;
        $equipo->volt_impulso_sec = $request->volt_impulso_sec;
        $equipo->corrt_nominal_sec = $request->corrt_nominal_sec;
        $equipo->corrt_termica_sec = $request->corrt_termica_sec;
        $equipo->peso_sec = $request->peso_sec;

        $equipo->accionamiento_clase_sec = $request->accionamiento_clase_sec;
        $equipo->accionamiento_tipo_sec = $request->accionamiento_tipo_sec;
        $equipo->año_fabricacion_sec = $request->año_fabricacion_sec;
        $equipo->peso_mando_motor_sec = $request->peso_mando_motor_sec;
        $equipo->volt_mando_sec = $request->volt_mando_sec;
        $equipo->volt_motor_sec = $request->volt_motor_sec;
        $equipo->volt_calefaccion_sec = $request->volt_calefaccion_sec;
        $equipo->corrt_nominal_sec = $request->corrt_nominal_sec;
        $equipo->altura_instalacion_sec = $request->altura_instalacion_sec;
        $equipo->nro_rfe_catalogo_sec = $request->nro_rfe_catalogo_sec;
        $equipo->par_total_sec = $request->par_total_sec;

        $equipo->accionamiento_clase_cuchuilla_sec = $request->accionamiento_clase_cuchuilla_sec;
        $equipo->accionamiento_tipo_cuchuilla_sec = $request->accionamiento_tipo_cuchuilla_sec;
        $equipo->año_fabricacion_cuchuilla_sec = $request->año_fabricacion_cuchuilla_sec;
        $equipo->peso_mando_motor_cuchuilla_sec = $request->peso_mando_motor_cuchuilla_sec;
        $equipo->volt_mando_cuchuilla_sec = $request->volt_mando_cuchuilla_sec;
        $equipo->volt_motor_cuchuilla_sec = $request->volt_motor_cuchuilla_sec;
        $equipo->volt_calefaccion_cuchuilla_sec = $request->volt_calefaccion_cuchuilla_sec;
        $equipo->altura_instalacion_cuchuilla_sec = $request->altura_instalacion_cuchuilla_sec;
        $equipo->nro_rfe_catalogo_cuchuilla_sec = $request->nro_rfe_catalogo_cuchuilla_sec;
        $equipo->par_total_cuchuilla_sec = $request->par_total_cuchuilla_sec;

        // Lógica para cargar la img adjunta
        $file = $request->file('img_sec');

        $originalFileName = $file->getClientOriginalName();

        $path = $file->storeAs('public/equipo_dis_seccionador/img', $originalFileName);

        // Almacena la imagén en la base de datos

        $url = '/storage/equipo_dis_seccionador/img/' . $originalFileName;

        $equipo->img_sec = $url;

        $equipo->save();
        // Muestra un mensaje de éxito en la sesión si el equipo se guardò en la baase de datos 
        session()->flash('success', 'Equipo creado exitosamente ⚙️ ');

        // Redirecciona a la página anterior
        return back();
    }



        
        

    /**
     * Show the form for editing the specified resource.
     */
    public function create_mantenimiento_equipo_interruptor($id_equipo)
    {
         // Obtiene el usuario actual, y lo guarda en la variable $user
         $user = $this->getCurrentUser();
        
        // Busca el equipo correspondiente al id proporcionado
        $equipo = Distribucion_interruptor::find($id_equipo);
        
        // Devuelve la vista con los datos 
        return view('Distribucion.Dis-update-equipo_interruptor', compact('equipo','user'));
    }


    public function store_mantenimiento_equipo_interruptor(Request $request, $id)
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
        $equipo = Distribucion_interruptor::findOrFail($id);
    
        // Crea un nuevo mantenimiento
        $mantenimiento = new MantenimientoEquipoDis_interruptor([
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
        $originalFileName = $file->getClientOriginalName();
        $path = $file->storeAs('public/mantenimientos_dis_interruptor/anexos', $originalFileName);
    
        // Almacena la URL del archivo en la base de datos
        $url = '/storage/mantenimientos_dis_interruptor/anexos/' . $originalFileName;
        $mantenimiento->anexos = $url;
    
        // Asocia el mantenimiento al equipo
        $equipo->mantenimientos()->save($mantenimiento);
    
        // Redirecciona con una alerta de éxito
        return redirect()->route('distribucion.create_mantenimiento_equipo_interruptor', $id)->with('success', 'Mantenimiento agregado exitosamente.☑️');
    }

    
}
