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
            height: 760px; /* Puedes ajustar el tamaño según tus necesidades */
            overflow: auto; /* Agrega una barra de desplazamiento si el contenido es demasiado largo */
        }
        .dotacion-container {
            margin-top: 5px;
            border: 1px solid #ccc;
            padding: 5px;
            height: 200px; /* Puedes ajustar el tamaño según tus necesidades */
            overflow: auto; /* Agrega una barra de desplazamiento si el contenido es demasiado largo */
        }
        .protecciones {
            margin-top: 5px;
            border: 1px solid #ccc;
            padding: 5px;
            height: 200px; /* Puedes ajustar el tamaño según tus necesidades */
            overflow: auto; /* Agrega una barra de desplazamiento si el contenido es demasiado largo */
        }

        .obs{
            margin-top: 2px;
        }

        .form-label{
            margin-top: 15px;
        }

        #formulario{
            padding: 2%;
            zoom: 80%;
        }

        .box-footer{
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
            <p style="margin: 0;"> 🔹Nuevo Interruptor  🔹</p>
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
        <form id="formulario" action="{{route('distribucion.store_equipo_interruptor')}}" method="POST" enctype="multipart/form-data" class="row g-3">
            <!-- esta linea requiere ruta Route::post definida en routes Route EquiposController-->

            @csrf

            <div class="col-12">
                <label for="text" class="form-label"> <br>
                🔹DATOS GENERALES
                </label>
            </div>

            <div class="col-md-2">
                <label for="nombre_interruptor" class="form-label">
                    Nombre Activo  
                </label>
                <input type="text" class="form-control" id="nombre_interruptor" name="nombre_interruptor" required/>
            </div>

            <div class="col-md-2">
                <label for="area" class="form-label">
                    Area
                </label>
                <select id=""  type="text" class="form-control" name="area" id="area" required>
                    <option selected></option>
                    <option value="Distribucion">Distribución</option>
                </select>
            </div>


            <div class="col-md-2">
                <label for="subestacion" class="form-label">
                    subestacion	
                </label>
                <select id="subestacion" class="custom-select" name="subestacion" required>
                    <option selected></option>
                    <option value="Nuevo">Puerto Asis</option>
                    <option value="En uso">Puerto Caicedo</option>
                    <option value="Fuero de servicio">Valle Del Guamuez</option>
                    <option value="En mantenimiento">Yarumo</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="nivel_tension" class="form-label">
                    Nivel de Tensión
                </label>
                <select type="text" class="form-control" id="nivel_tension" placeholder="" name="nivel_tension" required>
                    <option selected></option>
                    <option value="13.2">13.2 kv</option>
                    <option value="34.5">34.5 kv</option>
                    <option value="115">115 kv</option>
                    


                </select>
            </div>

            <div class="col-md-2">
                <label for="bahia" class="form-label">
                    Bahia
                </label>
                <select id="bahia" class="custom-select" placeholder="" name="bahia" required>
                    <option selected></option>
                    <option value="Linea">Bahia Linea</option>
                    <option value="Transformador">Bahia Transformador</option>
                </select>
            </div>



            <div class="col-2">
                <label for="fabricante" class="form-label">
                    fabricante
                </label>
                <select type="text" class="form-control" id=" fabricante" placeholder="" name="fabricante" required>
                    <option selected></option>
                    <option value="ABB">ABB</option>
                    <option value="Siemens">Siemens</option>
                </select>
            </div>
            <div class="col-2">
                <label for="costo_adquisicion" class="form-label">
                    Costo de adquisición
                </label>
                <input type="text" class="form-control" id="costo_adquisicion" placeholder="" name="costo_adquisicion" required/>
            </div>
            <div class="col-2">
                <label for="fecha_puesta_servicio" class="form-label">
                    Fecha de puesta en servicio
                </label>
                <input type="date" class="form-control" id="fecha_puesta_servicio" placeholder="" name="fecha_puesta_servicio" required/>
            </div>
            <div class="col-2">
                <label for="fecha_fabricacion" class="form-label">
                    Fecha de fabricación
                </label>
                <input type="date" class="form-control" id="fecha_fabricacion" placeholder="" name="fecha_fabricacion" required/>
            </div>

            <div class="col-2">
                <label for="iua_creg" class="form-label">
                    Pais de origen
                </label>
                <select type="text" class="form-control" id="iua_creg" placeholder="" name="iua_creg" required>
                    <option value=""></option>
                    <option value="Colombia">Colombia</option>
                    <option value="Brasil">Brasil</option>
                    <option value="Alemania">Alemania</option>        
                    <option value="India">India</option>
                    <option value="Suecia">Suecia</option>

                </select>
            </div>

            <div class="col-2">
                <label for="img_interruptor" class="form-label">
                    Cargar Imagén
                </label>
                <input type="file" class="form-control" id="img_interruptor" placeholder="" name="img_interruptor" required/>
            </div>


            <div class="col-12">
                <label for="text" class="form-label"> <br>
                    🔹ESPECIFICACIONES
                </label>
            </div>


            <div class="col-2"style="text-align: left;">
                <label for="nombre_equipo" class="form-label">
                    Nombre del equipo
                </label>
                <input type="text" class="form-control" id="nombre_equipo" placeholder="" name="nombre_equipo" required/>

            </div>
            <div class="col-2"style="text-align: left;">
                <label for="modelo_fabricacion" class="form-label">
                    Modelo de fabricación
                </label>
                <input type="text" class="form-control" id="cmodelo_fabricacionargo" placeholder="" name="modelo_fabricacion" required/>

            </div>

            <div class="col-md-2">
                <label for="nro_serie_fabricacion" class="form-label">
                    Numero de serie de fabricación
                </label>
                <input type="text" id="nro_serie_fabricacion" class="custom-select"  placeholder="" name="nro_serie_fabricacion" required> 
             
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="voltage_aislamiento_nominal" class="form-label">
                    Voltaje de aislamiento nominal
                </label>
                <input type="text" class="form-control" id="voltage_aislamiento_nominal" placeholder="" name="voltage_aislamiento_nominal" required/>

            </div>

            <div class="col-2" style="text-align: left;">
                <label for="frecuencia_nominal" class="form-label">
                    Frecuencia nominal
                </label>
                <input type="text" class="form-control" rows="1" id="frecuencia_nominal" placeholder="" name="frecuencia_nominal" required/>

            </div>

            <div class="col-2" style="text-align: left;">
                <label for="voltage_frequencia_indutrial" class="form-label">
                    Voltaje de frecuencia industrial
                </label>
            <input type="text" class="form-control" id="voltage_frequencia_indutrial" placeholder="" name="voltage_frequencia_indutrial" required/>

            </div>

            <div class="col-2" style="text-align: left;">
                <label for="voltage_impulso" class="form-label">
                    Voltaje de impulso
                </label>
                <input type="text" class="form-control" id="voltage_impulso" placeholder="" name="voltage_impulso" required/>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="corrientes_nominal" class="form-label">
                    Corriente nominal
                </label>
                <input type="text" class="form-control" id="corrientes_nominal" placeholder="" name="corrientes_nominal" required/>
            </div>    

            <div class="col-2" style="text-align: left;">
                <label for="corriente_termica" class="form-label">
                    Corriente termica
                </label>
                <input type="text" class="form-control" id="corriente_termica" placeholder="" name="corriente_termica" required/>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="corriente_dinamica" class="form-label">
                    Corriente dinamica
                </label>
                <input type="text" class="form-control" id="corriente_dinamica" placeholder="" name="corriente_dinamica" required/>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="corriente_nominal_cierre" class="form-label">
                    Corriente nominal de cierre
                </label>
                <input type="text" class="form-control" id="corriente_nominal_cierre" placeholder="" name="corriente_nominal_cierre" required/>
            </div>


            <div class="col-2" style="text-align: left;">
                <label for="medio_extincion" class="form-label">
                    Medio de extinción
                </label>
                <input type="text" class="form-control" id="medio_extincion" placeholder="" name="medio_extincion" required/>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="año_fabricacion" class="form-label">
                    Año de fabricación
                </label>
                <input type="text" class="form-control" id="año_fabricacion" placeholder="" name="año_fabricacion" required/>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="forma_cierre_desconexion" class="form-label">
                    Forma de cierre y desconexion
                </label>
                <input type="text" class="form-control" id="forma_cierre_desconexion" placeholder="" name="forma_cierre_desconexion" required/>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="factor_primer_polo" class="form-label">
                    Factor de primer polo
                </label>
                <input type="text" class="form-control" id="factor_primer_polo" placeholder="" name="factor_primer_polo" required/>
            </div>
            
            <div class="col-2" style="text-align: left;">
                <label for="secuencia_nominal_maniobra" class="form-label">
                    Secuencia nominal de maniobra
                </label>
                <input type="text" class="form-control" id="secuencia_nominal_maniobra" placeholder="" name="secuencia_nominal_maniobra" required/>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="presion" class="form-label">
                    Presión
                </label>
                <input type="text" class="form-control" id="presion" placeholder="" name="presion" required/>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="acondicionamiento" class="form-label">
                    Acondicionamiento
                </label>
                <select type="text" class="form-control" id="acondicionamiento" placeholder="" name="acondicionamiento" required>
                    <option selected></option>
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
                <input type="text" class="form-control" id="acondicionamiento_fabricante" placeholder="" name="acondicionamiento_fabricante" required/>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="acondicionamiento_serie" class="form-label">
                    Acondicionamiento serie
                </label>
                <input type="text" class="form-control" id="acondicionamiento_serie" placeholder="" name="acondicionamiento_serie" required/>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="peso_cantidad_carga" class="form-label">
                    Peso o cantidad de carga
                </label>
                <input type="text" class="form-control" id="peso_cantidad_carga" placeholder="" name="peso_cantidad_carga" required/>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="c_auxiliares_mando" class="form-label">
                    Cantidad de auxiliares de mando
                </label>
                <input type="text" class="form-control" id="c_auxiliares_mando" placeholder="" name="c_auxiliares_mando" required/>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="c_auxiliares_acondicionamiento" class="form-label">
                   Auxiliares_acondicionamiento
                </label>
                <input type="text" class="form-control" id="c_auxiliares_acondicionamiento" placeholder="" name="c_auxiliares_acondicionamiento" required/>
            </div>


            <div class="col-2" style="text-align: left;">
                <label for="c_auxiliares_calefaccion" class="form-label">
                    Auxiliares de calefacción
                </label>
                <input type="text" class="form-control" id="c_auxiliares_calefaccion" placeholder="" name="c_auxiliares_calefaccion" required/>
            </div>

            
            <div class="col-2" style="text-align: left;">
                <label for="altura_instalacion" class="form-label">
                    Altura de instalación
                </label>
                <input type="text" class="form-control" id="altura_instalacion" placeholder="" name="altura_instalacion" required/>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="clase_temperatura" class="form-label">
                    Clase de temperatura
                </label>
                <input type="text" class="form-control" id="clase_temperatura" placeholder="" name="clase_temperatura" required/>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="normas_fabricacion" class="form-label">
                    Normas de fabricación
                </label>
                <input type="text" class="form-control" id="normas_fabricacion" placeholder="" name="normas_fabricacion" required/>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="nro_ref_catalogo" class="form-label">
                    Nro de referencia de catálogo
                </label>
                <input type="text" class="form-control" id="nro_ref_catalogo" placeholder="" name="nro_ref_catalogo" required/>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="normas_fabricacion" class="form-label"></label>
            </div>
            <div class="col-2" style="text-align: left;">
                <label for="normas_fabricacion" class="form-label"></label>
            </div>
          
            <div class="box-footer" style="margin-bottom: 25px;">
            <br>
                <button type="submit" class="btn btn-primary" id="guardar-btn">Guardar</button>
            </div>
        </form>

@stop

@section('js')

@stop
