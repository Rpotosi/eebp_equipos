@extends('adminlte::page')

@section('title', 'HV Equipos Dis')

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
        margin-top: 5px;
        border: 1px solid #ccc;
        padding: 1px;
        height: 570px;
        /* Puedes ajustar el tamaño según tus necesidades */
        overflow: auto;
        /* Agrega una barra de desplazamiento si el contenido es demasiado largo */
    }

    /* Estilos para el botón moderno */
    .boton-moderno {
        padding: 10px 20px;
        /* Ajusta el relleno según tus necesidades */
        font-size: 16px;
        /* Ajusta el tamaño de fuente según tus necesidades */
        border: none;
        background-color: #4CAF50;
        /* Color de fondo del botón */
        color: white;
        /* Color del texto del botón */
        border-radius: 5px;
        /* Radio de borde para esquinas redondeadas */
        cursor: pointer;
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

    .equipo-container {
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

    #tabla {
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
        <p style="margin: 0;"> 🔹Historial Mantenimientos🔹</p>
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
    <form id="formulario" class="row g-3">
        <!-- esta linea requiere ruta Route::post definida en routes Route EquiposController-->


        <div class="col-12">
            <label for="text" class="form-label"> <br>
                🔹DATOS GENERALES
            </label>
        </div>

        <div class="col-2" style="with:30px">
            <img src="{{ asset($equipo->img_interruptor) }}" style=" with: 30px; height: 100px;"> <!--- esta esla ruta definida en el controlador --->
        </div>

        <div class="col-md-2">
            <label for="nombre_interruptor" class="form-label">
                Nombre Activo
            </label>
            <input type="text" class="form-control" id="nombre_interruptor" name="nombre_interruptor" value="{{$equipo->nombre_interruptor}}" disabled />
        </div>

        <div class="col-md-2">
            <label for="area" class="form-label">
                Area
            </label>
            <select class="custom-select" name="area" id="area" disabled>
                <option selected=""></option>
                <option value="Distribucion" {{$equipo->area == 'Distribucion' ? 'selected' : ''}}>Distribucion</option>
            </select>
        </div>


        <div class="col-md-2">
            <label for="subestacion" class="form-label">
                Subestacion
            </label>
            <select id="subestacion" class="custom-select" name="subestacion" value="{{$equipo->subestacion}}" disabled>
                <option selected=""></option>
                <option value="Puerto Asis" {{$equipo->subestacion == "Puerto Asis" ? 'selected' : ''}}>Puerto Asis</option>
                <option value="Puerto Caicedo" {{$equipo->subestacion == "Puerto Caicedo" ? 'selected' : ''}}>Puerto Caicedo</option>
                <option value="Valle Del Guamuez" {{$equipo->subestacion == "Valle Del Guamuez" ? 'selected' : ''}}>Valle Del Guamuez</option>
                <option value="Yarumo" {{$equipo->subestacion == "Yarumo" ? 'selected' : ''}}>Yarumo</option>
            </select>
        </div>

        <div class="col-md-2">
            <label for="nivel_tension" class="form-label">
                Nivel de Tensión
            </label>
            <select type="text" class="form-control" id="nivel_tension" placeholder="" name="nivel_tension" disabled>
                <option selected></option>
                <option value="13.2" {{$equipo->nivel_tension == '13.2' ? 'selected' : ''}}>13.2 kv</option>
                <option value="34.5" {{$equipo->nivel_tension == '34.5' ? 'selected' : ''}}>34.5 kv</option>
                <option value="115" {{$equipo->nivel_tension == '115' ? 'selected' : ''}}>115 kv</option>
            </select>
        </div>

        <div class="col-md-2">
            <label for="bahia" class="form-label">
                Bahia
            </label>
            <select id="bahia" class="custom-select" placeholder="" name="bahia" disabled>
                <option selected></option>
                <option value="Linea" {{$equipo->bahia == 'Linea' ? 'selected' : ''}}>Bahia Linea</option>
                <option value="Transformador" {{$equipo->bahia == 'Transformador' ? 'selected' : ''}}>Bahia Transformador</option>
            </select>
        </div>

        <div class="col-2">
            <label for="fabricante" class="form-label">
                fabricante
            </label>
            <select type="text" class="form-control" id="fabricante" placeholder="" name="fabricante" disabled>
                <option selected></option>
                <option value="ABB" {{$equipo->fabricante == 'ABB' ? 'selected' : ''}}>ABB</option>
                <option value="Siemens" {{$equipo->fabricante == 'Siemens' ? 'selected' : ''}}>Siemens</option>
            </select>
        </div>
        <div class="col-2">
            <label for="costo_adquisicion" class="form-label">
                Costo de adquisición
            </label>
            <input type="text" class="form-control" id="costo_adquisicion" placeholder="" name="costo_adquisicion" value="{{$equipo->costo_adquisicion}}" disabled />
        </div>
        <div class="col-2">
            <label for="fecha_puesta_servicio" class="form-label">
                Fecha de puesta en servicio
            </label>
            <input type="date" class="form-control" id="fecha_puesta_servicio" placeholder="" name="fecha_puesta_servicio" value="{{$equipo->fecha_puesta_servicio}}" disabled />
        </div>
        <div class="col-2">
            <label for="fecha_fabricacion" class="form-label">
                Fecha de fabricación
            </label>
            <input type="date" class="form-control" id="fecha_fabricacion" placeholder="" name="fecha_fabricacion" value="{{$equipo->fecha_fabricacion}}" disabled />
        </div>

        <div class="col-2">
            <label for="pais_origen" class="form-label">
                Pais de origen
            </label>
            <select type="text" class="form-control" id="pais_origen" placeholder="" name="pais_origen" disabled>
                <option value=""></option>
                <option value="Colombia" {{$equipo->pais_origen == 'Colombia' ? 'selected' : ''}}>Colombia</option>
                <option value="Brasil" {{$equipo->pais_origen == 'Brasil' ? 'selected' : ''}}>Brasil</option>
                <option value="Alemania" {{$equipo->pais_origen == 'Alemania' ? 'selected' : ''}}>Alemania</option>
                <option value="India" {{$equipo->pais_origen == 'India' ? 'selected' : ''}}>India</option>
                <option value="Suecia" {{$equipo->pais_origen == 'Suecia' ? 'selected' : ''}}>Suecia</option>
            </select>
        </div>



        <div class="col-12">
            <label for="text" class="form-label"> <br>
                🔹ESPECIFICACIONES
            </label>
        </div>


        <div class="col-2" style="text-align: left;">
            <label for="nombre_equipo" class="form-label">
                Nombre del equipo
            </label>
            <input type="text" class="form-control" id="nombre_equipo" placeholder="" name="nombre_equipo" value="{{$equipo->nombre_equipo}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="modelo_fabricacion" class="form-label">
                Modelo de fabricación
            </label>
            <input type="text" class="form-control" id="modelo_fabricacion" placeholder="" name="modelo_fabricacion" value="{{$equipo->modelo_fabricacion}}" disabled />
        </div>

        <div class="col-md-2">
            <label for="nro_serie_fabricacion" class="form-label">
                Numero de serie de fabricación
            </label>
            <input type="text" id="nro_serie_fabricacion" class="custom-select" placeholder="" name="nro_serie_fabricacion" value="{{$equipo->nro_serie_fabricacion}}" disabled>
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="voltage_aislamiento_nominal" class="form-label">
                Voltaje de aislamiento nominal
            </label>
            <input type="text" class="form-control" id="voltage_aislamiento_nominal" placeholder="" name="voltage_aislamiento_nominal" value="{{$equipo->voltage_aislamiento_nominal}}" disabled />

        </div>

        <div class="col-2" style="text-align: left;">
            <label for="frecuencia_nominal" class="form-label">
                Frecuencia nominal
            </label>
            <input type="text" class="form-control" rows="1" id="frecuencia_nominal" placeholder="" name="frecuencia_nominal" value="{{$equipo->frecuencia_nominal}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="voltage_frequencia_indutrial" class="form-label">
                Voltaje de frecuencia industrial
            </label>
            <input type="text" class="form-control" id="voltage_frequencia_indutrial" placeholder="" name="voltage_frequencia_indutrial" value="{{$equipo->voltage_frequencia_indutrial}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="voltage_impulso" class="form-label">
                Voltaje de impulso
            </label>
            <input type="text" class="form-control" id="voltage_impulso" placeholder="" name="voltage_impulso" value="{{$equipo->voltage_impulso}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="corrientes_nominal" class="form-label">
                Corriente nominal
            </label>
            <input type="text" class="form-control" id="corrientes_nominal" placeholder="" name="corrientes_nominal" value="{{$equipo->corrientes_nominal}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="corriente_termica" class="form-label">
                Corriente termica
            </label>
            <input type="text" class="form-control" id="corriente_termica" placeholder="" name="corriente_termica" value="{{$equipo->corriente_termica}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="corriente_dinamica" class="form-label">
                Corriente dinamica
            </label>
            <input type="text" class="form-control" id="corriente_dinamica" placeholder="" name="corriente_dinamica" value="{{$equipo->corriente_dinamica}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="corriente_nominal_cierre" class="form-label">
                Corriente nominal de cierre
            </label>
            <input type="text" class="form-control" id="corriente_nominal_cierre" placeholder="" name="corriente_nominal_cierre" value="{{$equipo->corriente_nominal_cierre}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="medio_extincion" class="form-label">
                Medio de extinción
            </label>
            <input type="text" class="form-control" id="medio_extincion" placeholder="" name="medio_extincion" value="{{$equipo->medio_extincion}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="año_fabricacion" class="form-label">
                Año de fabricación
            </label>
            <input type="text" class="form-control" id="año_fabricacion" placeholder="" name="año_fabricacion" value="{{$equipo->año_fabricacion}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="forma_cierre_desconexion" class="form-label">
                Forma de cierre y desconexion
            </label>
            <input type="text" class="form-control" id="forma_cierre_desconexion" placeholder="" name="forma_cierre_desconexion" value="{{$equipo->forma_cierre_desconexion}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="factor_primer_polo" class="form-label">
                Factor de primer polo
            </label>
            <input type="text" class="form-control" id="factor_primer_polo" placeholder="" name="factor_primer_polo" value="{{$equipo->factor_primer_polo}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="secuencia_nominal_maniobra" class="form-label">
                Secuencia nominal de maniobra
            </label>
            <input type="text" class="form-control" id="secuencia_nominal_maniobra" placeholder="" name="secuencia_nominal_maniobra" value="{{$equipo->secuencia_nominal_maniobra}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="presion" class="form-label">
                Presión
            </label>
            <input type="text" class="form-control" id="presion" placeholder="" name="presion" value="{{$equipo->presion}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="acondicionamiento" class="form-label">
                Acondicionamiento
            </label>
            <select type="text" class="form-control" id="acondicionamiento" placeholder="" name="acondicionamiento" disabled>
                <option selected>{{$equipo->acondicionamiento}}</option>
                <option value="Hidráulico">Hidráulico</option>
                <option value="Neumático">Neumático</option>
                <option value="Resorte">Resorte</option>
                <option value="Solenoide">Solenoide</option>
            </select>
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="acondicionamiento_fabricante" class="form-label">
                Acondicionamiento fabricante
            </label>
            <input type="text" class="form-control" id="acondicionamiento_fabricante" placeholder="" name="acondicionamiento_fabricante" value="{{$equipo->acondicionamiento_fabricante}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="acondicionamiento_serie" class="form-label">
                Acondicionamiento serie
            </label>
            <input type="text" class="form-control" id="acondicionamiento_serie" placeholder="" name="acondicionamiento_serie" value="{{$equipo->acondicionamiento_serie}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="peso_cantidad_carga" class="form-label">
                Peso o cantidad de carga
            </label>
            <input type="text" class="form-control" id="peso_cantidad_carga" placeholder="" name="peso_cantidad_carga" value="{{$equipo->peso_cantidad_carga}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="c_auxiliares_mando" class="form-label">
                Cantidad de auxiliares de mando
            </label>
            <input type="text" class="form-control" id="c_auxiliares_mando" placeholder="" name="c_auxiliares_mando" value="{{$equipo->c_auxiliares_mando}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="c_auxiliares_acondicionamiento" class="form-label">
                Auxiliares_acondicionamiento
            </label>
            <input type="text" class="form-control" id="c_auxiliares_acondicionamiento" placeholder="" name="c_auxiliares_acondicionamiento" value="{{$equipo->c_auxiliares_acondicionamiento}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="c_auxiliares_calefaccion" class="form-label">
                Auxiliares de calefacción
            </label>
            <input type="text" class="form-control" id="c_auxiliares_calefaccion" placeholder="" name="c_auxiliares_calefaccion" value="{{$equipo->c_auxiliares_calefaccion}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="altura_instalacion" class="form-label">
                Altura de instalación
            </label>
            <input type="text" class="form-control" id="altura_instalacion" placeholder="" name="altura_instalacion" value="{{$equipo->altura_instalacion}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="clase_temperatura" class="form-label">
                Clase de temperatura
            </label>
            <input type="text" class="form-control" id="clase_temperatura" placeholder="" name="clase_temperatura" value="{{$equipo->clase_temperatura}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="normas_fabricacion" class="form-label">
                Normas de fabricación
            </label>
            <input type="text" class="form-control" id="normas_fabricacion" placeholder="" name="normas_fabricacion" value="{{$equipo->normas_fabricacion}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="nro_ref_catalogo" class="form-label">
                Nro de referencia de catálogo
            </label>
            <input type="text" class="form-control" id="nro_ref_catalogo" placeholder="" name="nro_ref_catalogo" value="{{$equipo->nro_ref_catalogo}}" disabled />
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="normas_fabricacion" class="form-label"></label>
        </div>

        <div class="col-2" style="text-align: left;">
            <label for="normas_fabricacion" class="form-label"></label>
        </div>

    </form>




    <div class="table-responsive" id="tabla">
        <table class="table table-hover table-condensed table-bordered mt-5">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Descripción</th>
                    <th>Tipo Procedimiento</th>
                    <th>Responsable</th>
                    <th>Laboratorio Empresa</th>
                    <th>Observaciones</th>
                    <th>Anexos</th>
                </tr>
            </thead>
            <tbody>

                @foreach ( $mantenimientos as $mantenimiento )

                <tr>


                    <td>
                        {{$mantenimiento->id}}
                    </td>

                    <td>
                        {{$mantenimiento->fecha_mantenimiento}}
                    </td>

                    <td>
                        {{$mantenimiento->descripcion }}
                    </td>

                    <td>
                        {{$mantenimiento->tipo_procedimiento}}
                    </td>

                    <td>
                        {{$mantenimiento->responsable}}
                    </td>

                    <td>
                        {{$mantenimiento->laboratorio_empresa}}
                    </td>

                    <td>
                        {{$mantenimiento->observaciones}}
                    </td>

                    <td>
                        @if ($mantenimiento->anexos)
                        <a href="{{ asset(env('FILE_BASE_URL') . $mantenimiento->anexos) }}">
                            <button class="boton-moderno"><i class="fas fa-eye"></i></button>
                        </a>
                        @else
                        <span class="text-muted">Sin Orden Física</span>
                        @endif
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Paginación con enlaces y variables de búsqueda incluidas -->
        <!-- Paginación con enlaces y variables de búsqueda incluidas -->
        {{$mantenimientos->links()}}

    </div>

    @stop

    @section('js')

    @stop