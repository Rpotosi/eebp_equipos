@extends('adminlte::page')

@section('title', 'Crear Equipos Dis')

@section('content_header')

@section('css')
<link rel="icon" href="{{ asset('img/icon.jpg') }}">
@stop

<div style="text-align: end;">
    <div style="background-color: #08b94e; display: inline-block; padding: 5px;">
        <p style="margin: 0;"><b>Bievenido:</b>{{ $user->username }}</p>
    </div>
</div>

<style>
    .form-container {
        margin-top: 1px;
        border: 1px solid #ccc;
        padding: 1px;
        height: 760px;
        /* Puedes ajustar el tamaño según tus necesidades */
        overflow: auto;
        /* Agrega una barra de desplazamiento si el contenido es demasiado largo */
    }

    .dotacion-container {
        margin-top: 5px;
        border: 1px solid #ccc;
        padding: 5px;
        height: 200px;
        /* Puedes ajustar el tamaño según tus necesidades */
        overflow: auto;
        /* Agrega una barra de desplazamiento si el contenido es demasiado largo */
    }

    .protecciones {
        margin-top: 5px;
        border: 1px solid #ccc;
        padding: 5px;
        height: 200px;
        /* Puedes ajustar el tamaño según tus necesidades */
        overflow: auto;
        /* Agrega una barra de desplazamiento si el contenido es demasiado largo */
    }

    .obs {
        margin-top: 2px;
    }

    .form-label {
        margin-top: 15px;
    }

    #formulario {
        padding: 2%;
        zoom: 80%;
    }

    .box-footer {
        padding: 8px;
    }

    .btn {
        background-color: rgb(87, 156, 41);
        box-shadow: none;
        border-color: rgb(87, 156, 41);

    }
</style>

<div style="text-align: center;">
    <div style="background-color: white; display: inline-block; padding: 12px;">
        <p style="margin: 0;"> 🔹Nuevo Equipo🔹</p>
    </div>
</div>


@stop

@section('content')

<!--Start Alertas utilizadas en el mensaje de Orden creada exitosamente -->
@if (session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif

@if (session('error'))
<script>
    alert("{{ session('error') }}");
</script>
@endif
<div class="form-container">
    <form id="formulario" action="{{route('distribucion.store_equipo_seccionador')}}" method="POST" enctype="multipart/form-data" class="row g-3">
        <!-- esta linea requiere ruta Route::post definida en routes Route EquiposController-->

        @csrf

        <div class="col-12">
            <label for="text" class="form-label"> <br>
                🔹DATOS GENERALES
            </label>
        </div>


        <div class="col-2">
            <label for="nombre_activo_sec" class="form-label">Nombre Activo</label>
            <input type="text" class="form-control" id="nombre_activo_sec" name="nombre_activo_sec" required>
        </div>
        <div class="col-2">
            <label for="area_sec" class="form-label">Área</label>
            <input type="text" class="form-control" id="area_sec" name="area_sec" required>
        </div>
        <div class="col-2">
            <label for="subestacion_sec" class="form-label">Subestación</label>
            <input type="text" class="form-control" id="subestacion_sec" name="subestacion_sec" required>
        </div>
        <div class="col-2">
            <label for="nivel_tension_sec" class="form-label">Nivel de tensión</label>
            <input type="text" class="form-control" id="nivel_tension_sec" name="nivel_tension_sec" required>
        </div>

        <div class="col-2">
            <label for="bahia_sec" class="form-label
                ">Bahía</label>
            <input type="text" class="form-control" id="bahia_sec" name="bahia_sec" required>
        </div>
        <div class="col-2">
            <label for="iua_sec" class="form-label
                ">IUA</label>
            <input type="text" class="form-control" id="iua_sec" name="iua_sec" required>
        </div>
        <div class="col-2">
            <label for="fabricante_sec" class="form-label
                ">Fabricante</label>
            <input type="text" class="form-control" id="fabricante_sec" name="fabricante_sec" required>
        </div>
        <div class="col-2">
            <label for="costo_adquisicion_sec" class="form-label
                ">Costo de adquisición</label>
            <input type="text" class="form-control" id="costo_adquisicion_sec" name="costo_adquisicion_sec" required>
        </div>
        <div class="col-2">
            <label for="fecha_puesta_servicio_sec" class="form-label
                ">Fecha de puesta en servicio</label>
            <input type="date" class="form-control" id="fecha_puesta_servicio_sec" name="fecha_puesta_servicio_sec" required>
        </div>
        <div class="col-2">
            <label for="pais_origen_sec" class="form-label  ">País de origen</label>
            <input type="text" class="form-control" id="pais_origen_sec" name="pais_origen_sec" required>
        </div>
        <div class="col-2">
            <label for="img_sec" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="img_sec" name="img_sec" required>
        </div>

        <!---Especificaciones--->

        <div class="col-12">
            <label for="text" class="form-label"> <br>
                🔹ESPECIFICACIONES
            </label>
        </div>


        <div class="col-2">
            <label for="nombre_equipo_sec" class="form-label">Nombre del equipo</label>
            <input type="text" class="form-control" id="nombre_equipo_sec" name="nombre_equipo_sec" required>
        </div>
        <div class="col-2">
            <label for="modelo_fabricacion_sec" class="form-label">Modelo de fabricación</label>
            <input type="text" class="form-control" id="modelo_fabricacion_sec" name="modelo_fabricacion_sec" required>
        </div>
        <div class="col-2">
            <label for="nro_serie_fabricacion_sec" class="form-label">Nro. de serie de fabricación</label>
            <input type="text" class="form-control" id="nro_serie_fabricacion_sec" name="nro_serie_fabricacion_sec" required>
        </div>
        <div class="col-2">
            <label for="fecha_fabricacion_sec" class="form-label">Fecha de fabricación</label>
            <input type="date" class="form-control" id="fecha_fabricacion_sec" name="fecha_fabricacion_sec" required>
        </div>
        <div class="col-2">
            <label for="volt_aislto_nominal_sec" class="form-label">Voltaje aislamiento nominal</label>
            <input type="text" class="form-control" id="volt_aislto_nominal_sec" name="volt_aislto_nominal_sec" required>
        </div>
        <div class="col-2">
            <label for="frecuencia_nominal_sec" class="form-label">Frecuencia nominal</label>
            <input type="text" class="form-control" id="frecuencia_nominal_sec" name="frecuencia_nominal_sec" required>
        </div>
        <div class="col-2">
            <label for="volt_impulso_sec" class="form-label">Voltaje de impulso</label>
            <input type="text" class="form-control" id="volt_impulso_sec" name="volt_impulso_sec" required>
        </div>

        <div class="col-2">
            <label for="corrt_nominal_sec" class="form-label">Corriente nominal</label>
            <input type="text" class="form-control" id="corrt_nominal_sec" name="corrt_nominal_sec" required>
        </div>
        <div class="col-2">
            <label for="corrt_termica_sec" class="form-label">Corriente térmica</label>
            <input type="text" class="form-control" id="corrt_termica_sec" name="corrt_termica_sec" required>
        </div>
        <div class="col-2">
            <label for="peso_sec" class="form-label">Peso</label>
            <input type="text" class="form-control" id="peso_sec" name="peso_sec" required>
        </div>

        <!-----Mando Motor----->|

        <div class="col-12">
            <label for="text" class="form-label"> <br>
                🔹MANDO MOTOR SECCIONADOR TRIPOLAR
            </label>
        </div>

        <div class="col-2">
            <label for="accionamiento_clase_sec" class="form-label">Clase de accionamiento</label>
            <input type="text" class="form-control" id="accionamiento_clase_sec" name="accionamiento_clase_sec" required>
        </div>
        <div class="col-2">
            <label for="accionamiento_tipo_sec" class="form-label">Tipo de accionamiento</label>
            <input type="text" class="form-control" id="accionamiento_tipo_sec" name="accionamiento_tipo_sec" required>
        </div>
        <div class="col-2">
            <label for="año_fabricacion_sec" class="form-label">Año de fabricación</label>
            <input type="text" class="form-control" id="año_fabricacion_sec" name="año_fabricacion_sec" required>
        </div>
        <div class="col-2">
            <label for="peso_mando_motor_sec" class="form-label">Peso del mando motor</label>
            <input type="text" class="form-control" id="peso_mando_motor_sec" name="peso_mando_motor_sec" required>
        </div>
        <div class="col-2">
            <label for="volt_mando_sec" class="form-label
                ">Voltaje de mando</label>
            <input type="text" class="form-control" id="volt_mando_sec" name="volt_mando_sec" required>
        </div>
        <div class="col-2">
            <label for="volt_motor_sec" class="form-label
                ">Voltaje del motor</label>
            <input type="text" class="form-control" id="volt_motor_sec" name="volt_motor_sec" required>
        </div>
        <div class="col-2">
            <label for="volt_calefaccion_sec" class="form-label
                ">Voltaje de calefacción</label>
            <input type="text" class="form-control" id="volt_calefaccion_sec" name="volt_calefaccion_sec" required>
        </div>
        <div class="col-2">
            <label for="corrt_nominal_mando_sec" class="form-label
                ">Corriente nominal mando</label>
            <input type="text" class="form-control" id="corrt_nominal_mando_sec" name="corrt_nominal_mando_sec" required>
        </div>
        <div class="col-2">
            <label for="altura_instalacion_sec" class="form-label
                ">Altura de instalación</label>
            <input type="text" class="form-control" id="altura_instalacion_sec" name="altura_instalacion_sec" required>
        </div>
        <div class="col-2">
            <label for="nro_rfe_catalogo_sec" class="form-label
                ">Nro. RFE catálogo</label>
            <input type="text" class="form-control" id="nro_rfe_catalogo_sec" name="nro_rfe_catalogo_sec" required>
        </div>
        <div class="col-2">
            <label for="par_total_sec" class="form-label
                ">Par total</label>
            <input type="text" class="form-control" id="par_total_sec" name="par_total_sec" required>
        </div>


        <!-----Mando Cuchuilla----->|

        <div class="col-12">
            <label for="text" class="form-label"> <br>
                🔹MANDO MOTOR CUCHILLA DE PUESTA A TIERRA
            </label>
        </div>
        


        <div class="col-2">
            <label for="accionamiento_clase_cuchuilla_sec" class="form-label
                ">Clase de accionamiento</label>
            <input type="text" class="form-control" id="accionamiento_clase_cuchuilla_sec" name="accionamiento_clase_cuchuilla_sec" required>
        </div>

        <div class="col-2">
            <label for="accionamiento_tipo_cuchuilla_sec" class="form-label
                ">Tipo</label>
            <input type="text" class="form-control" id="accionamiento_tipo_cuchuilla_sec" name="accionamiento_tipo_cuchuilla_sec" required>
        </div>
        <div class="col-2">
            <label for="año_fabricacion_cuchuilla_sec" class="form-label
                ">Año fabricación</label>
            <input type="text" class="form-control" id="año_fabricacion_cuchuilla_sec" name="año_fabricacion_cuchuilla_sec" required>
        </div>
        <div class="col-2">
            <label for="peso_mando_motor_cuchuilla_sec" class="form-label
                ">Peso</label>
            <input type="text" class="form-control" id="peso_mando_motor_cuchuilla_sec" name="peso_mando_motor_cuchuilla_sec" required>
        </div>
        <div class="col-2">
            <label for="volt_mando_cuchuilla_sec" class="form-label
                ">Voltaje de mando de cuchuilla</label>
            <input type="text" class="form-control" id="volt_mando_cuchuilla_sec" name="volt_mando_cuchuilla_sec" required>
        </div>
        <div class="col-2">
            <label for="volt_motor_cuchuilla_sec" class="form-label
                ">Voltaje del motor de cuchuilla</label>
            <input type="text" class="form-control" id="volt_motor_cuchuilla_sec" name="volt_motor_cuchuilla_sec" required>
        </div>
        <div class="col-2">
            <label for="volt_calefaccion_cuchuilla_sec" class="form-label
                ">Voltaje de calefacción de cuchuilla</label>
            <input type="text" class="form-control" id="volt_calefaccion_cuchuilla_sec" name="volt_calefaccion_cuchuilla_sec" required>
        </div>

        <div class="col-2">
            <label for="altura_instalacion_cuchuilla_sec" class="form-label
                ">Altura de instalación de cuchuilla</label>
            <input type="text" class="form-control" id="altura_instalacion_cuchuilla_sec" name="altura_instalacion_cuchuilla_sec" required>
        </div>
        <div class="col-2">
            <label for="nro_rfe_catalogo_cuchuilla_sec" class="form-label
                ">Nro. RFE catálogo de cuchuilla</label>
            <input type="text" class="form-control" id="nro_rfe_catalogo_cuchuilla_sec" name="nro_rfe_catalogo_cuchuilla_sec" required>
        </div>
        <div class="col-2">
            <label for="par_total_cuchuilla_sec" class="form-label
                ">Par total de cuchuilla</label>
            <input type="text" class="form-control" id="par_total_cuchuilla_sec" name="par_total_cuchuilla_sec" required>
        </div>

        <div class="col-12">
        </div>
        
        <br>
        <div class="box-footer" style="margin-bottom: 25px;">
            <button type="submit" class="btn btn-primary" id="guardar-btn">Guardar</button>
        </div>
    </form>

    @stop

    @section('js')

    @stop