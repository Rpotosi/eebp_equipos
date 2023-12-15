@extends('adminlte::page')

@section('title', 'Crear Equipos SST')

@section('content_header')

@section('css')
    <link rel="icon" href="{{ asset('img/icon.jpg') }}">
@stop

<div style="text-align: end;">
    <div style="background-color: #08b94e ; display: inline-block; padding: 5px;">
        <p style="margin: 0;"><b>Bienvenido: </b>{{ $user->username }}</p>
    </div>
</div>

    <style>
        .form-container {
            margin-top: 5px;
            border: 1px solid #ccc;
            padding: 1px;
            height: 570px; /* Puedes ajustar el tamaño según tus necesidades */
            overflow: auto; /* Agrega una barra de desplazamiento si el contenido es demasiado largo */
        }
        .dotacion-container {
            margin-top: 5px;
            border: 1px solid #ccc;
            padding: 5px;
            height: 200px; /* Puedes ajustar el tamaño según tus necesidades */
            overflow: auto; /* Agrega una barra de desplazamiento si el contenido es demasiado largo */
        }
        .equipo-container {
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
        <form id="formulario" action="{{route('sst.store_equipo')}}" method="POST" enctype="multipart/form-data" class="row g-3">
            <!-- esta linea requiere ruta Route::post definida en routes Route EquiposController-->

            @csrf

            <div class="col-12">
                <label for="text" class="form-label"> <br>
                🔹IDENTIFICACIÓN Y ESPECIFICACIONES DEL EQUIPO
                </label>
            </div>

            <div class="col-md-2">
                <label for="nombre_equipo" class="form-label">
                    Nombre tecnico del equipo
                </label>
                <input type="text" class="form-control" id="nombre_equipo" name="nombre_equipo" required/>
            </div>

            <div class="col-md-2">
                <label for="ubicacion_equipo" class="form-label">
                    Ubicación del equipo
                </label>
                <select id="clase" class="custom-select" id="ubicacion_equipo" placeholder="" name="ubicacion_equipo" required>
                    <option selected=""></option>
                    <option>Sede PA</option>
                    <option>Sede VG</option>
                    <option>Sede Caicedo</option>
                    <option>Sede la Dorada</option>
                    <option>Subestacione PA</option>
                    <option>Subestacion PC</option>
                    <option>Subestacion Yarumo</option>
                    <option>Subestacion la Hormiga</option>
                </select>
            </div>


            <div class="col-md-2">
                <label for="estado" class="form-label">
                    Estado
                </label>
                <select id="clase" class="custom-select" id="estado" placeholder="" name="estado" required>
                    <option selected=""></option>
                    <option>Nuevo</option>
                    <option>En uso</option>
                    <option>Fuero de servicio</option>
                    <option>En mantenimiento</option>
                    <option>Para disposición final</option>

                </select>

            </div>

            <div class="col-md-2">
                <label for="fecha_fabrica" class="form-label">
                    Fecha de fabrica
                </label>
                <input type="date" class="form-control" id="fecha_fabrica" placeholder="" name="fecha_fabrica" required/>
            </div>

            <div class="col-md-2">
                <label for="marca" class="form-label">
                    Marca
                </label>
                <select id="clase" class="custom-select" id="marca" placeholder="" name="marca" required>
                    <option selected=""></option>
                    <option>Nuevo uso</option>
                    <option>Dimanik</option>
                    <option>Link tech</option>
                    <option>Insafe</option>
                    <option>Sosega</option>
                    <option>Yoke</option>
                    <option>Petzel</option>
                    <option>Armadura</option>
                    <option>3M</option>
                    <option>Ecolift</option>
                    <option>Arseg</option>
                    <option>Delta Plus</option>
                    <option>Regeltex</option>
                    <option>Iproteccion</option>
                    <option>Alcovisor</option>
                    <option>DR Meter</option>
                    <option>Gil</option>
                    <option>GH Voltaje</option>
                    <option>Orbit</option>
                </select>

            </div>



            <div class="col-2">
                <label for="modelo" class="form-label">
                    Modelo
                </label>
                <input type="text" class="form-control" id="modelo" placeholder="" name="modelo" required/>
            </div>
            <div class="col-2">
                <label for="no_serie" class="form-label">
                    No. Serie
                </label>
                <input type="text" class="form-control" id="no_serie" placeholder="" name="no_serie" required/>
            </div>
            <div class="col-2">
                <label for="no_lote" class="form-label">
                    No. Lote
                </label>
                <input type="text" class="form-control" id="no_lote" placeholder="" name="no_lote" required/>
            </div>
            <div class="col-2">
                <label for="no_activo" class="form-label">
                    No. de activo fijo
                </label>
                <input type="text" class="form-control" id="no_activo" placeholder="" name="no_activo" required/>
            </div>

            <div class="col-2">
                <label for="codigo" class="form-label">
                    Codigo
                </label>
                <input type="text" class="form-control" id="codigo" placeholder="" name="codigo" required/>
            </div>

            <div class="col-2">
                <label for="fecha_ensayo" class="form-label">
                    Fecha del ensayo dieléctrico
                </label>
                <input type="date" class="form-control" id="fecha_ensayo" placeholder="" name="fecha_ensayo" required/>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="validez" class="form-label">
                    Validez
                </label>
                <select id="clase" class="custom-select" id="validez" placeholder="" name="validez" required>
                    <option selected=""></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>Mayor | 3</option>
                </select>
            </div>


            <div class="col-2" style="text-align: left;">
                <label for="fecha_conformidad" class="form-label">
                    Fecha del certificado de conformidad
                </label>
                <input type="date" class="form-control" id="fecha_conformidad" placeholder="" name="fecha_conformidad" required/>

            </div>

            <div class="col-2" style="text-align: left;">
                <label for="fecha_operacion" class="form-label"> <br>
                    Fecha Inicio de Operación
                </label>
                <input type="date" class="form-control" id="fecha_operacion" placeholder="" name="fecha_operacion" required/>

            </div>

            <div class="col-12">
                <label for="text" class="form-label"> <br>
                    🔹RESPONSABLE DEL EQUIPO
                </label>
            </div>


            <div class="col-2"style="text-align: left;">
                <label for="nombre_responsable" class="form-label">
                    Nombre
                </label>
                <input type="text" class="form-control" id="nombre_responsable" placeholder="" name="nombre_responsable" required/>

            </div>
            <div class="col-2"style="text-align: left;">
                <label for="cargo" class="form-label">
                    Cargo
                </label>
                <input type="text" class="form-control" id="cargo" placeholder="" name="cargo" required/>

            </div>

            <div class="col-md-2">
                <label for="lugar_proceso" class="form-label">
                    Lugar o Proceso
                </label>
                <select id="clase" class="custom-select" id="lugar_proceso" placeholder="" name="lugar_proceso" required>
                    <option selected></option>
                    <option>Almacén</option>
                    <option>Bodega</option>
                    <option>Vehículo PAK175</option>
                    <option>PAK176</option>
                    <option>Vehículo PAK178</option>
                    <option>Vehículo PAK 169</option>
                    <option>Vehículo  PAK167</option>
                    <option>Vehículo LFL640 </option>
                    <option>Vehículo PAK172</option>
                    <option>Vehículo PAK171</option>
                    <option>Vehículo PAK170</option>
                    <option>Vehículo AVI892</option>
                    <option>Vehículo AVA496</option>
                    <option>Vehículo JHD10F</option>
                    <option>cuadrilla 1</option>
                    <option>cuadrilla 2</option>
                    <option>cuadrilla 3</option>
                    <option>cuadrilla 4</option>
                    <option>SST</option>
                    <option>Talento Humano</option>
                    <option>Control de Energía</option>

                </select>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="fecha_entrega" class="form-label">
                    Fecha de entrega
                </label>
                <input type="date" class="form-control" id="fecha_entrega" placeholder="" name="fecha_entrega" required/>

            </div>

            <div class="col-2" style="text-align: left;">
                <label for="observacion_responsable" class="form-label">
                    Observaciones
                </label>
                <textarea type="text" class="form-control" rows="1" id="observacion_responsable" placeholder="" name="observacion_responsable"></textarea>

            </div>

            <div class="col-12">
                <label for="text" class="form-label"> <br>
                    🔹DATOS DEL PROVEEDOR
                </label>
            </div>


            <div class="col-2" style="text-align: left;">
                <label for="fabricante" class="form-label">
                    Fabricante
                </label>
                <select id="clase" class="custom-select" id="fabricante" placeholder="" name="fabricante" required>
                    <option selected=""></option>
                    <option>Sew</option>
                    <option>Supersafe</option>
                    <option>WJ Rescates</option>
                    <option>Dinamik</option>
                    <option>Steelpro</option>
                    <option>Petzel</option>
                    <option>Alcovisor</option>
                    <option>Hastings</option>
                    <option>Regeltex</option>
                    <option>Super safe</option>
                </select>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="proveedor" class="form-label">
                    Proveedor
                </label>
                <input type="text" class="form-control" id="proveedor" placeholder="" name="proveedor" required/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="fecha_adquisicion" class="form-label">
                    Fecha de adquisición
                </label>
                <input type="date" class="form-control" id="fecha_adquisicion" placeholder="" name="fecha_adquisicion" required/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="nombre_proveedor" class="form-label">
                    Nombre
                </label>
                <input type="text" class="form-control" id="nombre_proveedor" placeholder="" name="nombre_proveedor" required/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="direccion_proveedor" class="form-label">
                    Dirección
                </label>
                <input type="text" class="form-control" id="direccion_proveedor" placeholder="" name="direccion_proveedor" required/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="email_proveedor" class="form-label">
                    E-mail
                </label>
                <input type="text" class="form-control" id="email_proveedor" placeholder="" name="email_proveedor" required/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="telefono_proveedor" class="form-label">
                    Telefono
                </label>
                <input type="text" class="form-control" id="telefono_proveedor" placeholder="" name="telefono_proveedor" required/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="catalogo" class="form-label">
                    Posee catálogo de manejo OP
                </label>
                <select id="clase" class="custom-select" id="catalogo" placeholder="" name="catalogo" required>
                    <option selected=""></option>
                    <option>SI</option>
                    <option>NO</option>
                </select>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="mantenimiento_recomendado" class="form-label">
                    <br>
                    Mantenimiento recomendado
                </label>
                <select id="clase" class="custom-select" id="mantenimiento_recomendado" placeholder="" name="mantenimiento_recomendado" required>
                    <option selected=""></option>
                    <option value="">Preventivo</option>
                    <option value="">Inspección</option>
                    <option value="">Verificación</option>
                    <option value="">Ensayo</option>
                    <option value="">Calibración</option>
                </select>

            </div>

            <div class="col-2" style="text-align: left;">
                <label for="condiciones_operacion" class="form-label"> <br>
                    Condiciones de operación:
                </label>
                <input type="text" class="form-control" id="condiciones_operacion" placeholder="" name="condiciones_operacion" required/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="observacion_fabricante" class="form-label"> <br>
                    Observaciones
                </label>
                <textarea type="text" class="form-control" rows="1" id="observacion_fabricante" placeholder="" name="observacion_fabricante"></textarea>

            </div>

            <div class="col-12">
                <label for="text" class="form-label"><br>
                    🔹 CARACTERISTICAS DEL EQUIPO
                </label>
            </div>


            <div class="col-2" style="text-align: left;">
                <label for="medicion" class="form-label">
                    Medición a realizar
                </label>
                <input type="text" class="form-control" id="medicion" placeholder="" name="medicion" required/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="rango_uso" class="form-label">
                    Rango de Uso
                </label>
                <input type="text" class="form-control" id="rango_uso" placeholder="" name="rango_uso" required/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="resolucion" class="form-label">
                    Resolución
                </label>
                <input type="text" class="form-control" id="resolucion" placeholder="" name="resolucion" required/>

            </div>

            <div class="col-2" style="text-align: left;">
                <label for="exactitud" class="form-label">
                    Exactitud
                </label>
                <input type="text" class="form-control" id="exactitud" placeholder="" name="exactitud" required/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="fecha_calibracion" class="form-label">
                    Frecuencia de Calibración
                </label>
                <input type="text" class="form-control" id="fecha_calibracion" placeholder="" name="fecha_calibracion" required/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="fecha_verificacion" class="form-label">
                    Frecuencia de Verificación
                </label>
                <input type="text" class="form-control" id="fecha_verificacion" placeholder="" name="fecha_verificacion" required/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="patrones" class="form-label">
                    Patrones
                </label>
                <input type="text" class="form-control" id="patrones" placeholder="" name="patrones" required/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="estandares" class="form-label">
                    Estándares
                </label>
                <input type="text" class="form-control" id="estandares" placeholder="" name="estandares" required/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="regulaciones" class="form-label">
                    Regulaciones
                </label>
                <input type="text" class="form-control" id="regulaciones" placeholder="" name="regulaciones" required/>

            </div>

            <div class="col-2" style="text-align: left;">
                <label for="otras_caracteristicas" class="form-label">
                    Otras características
                </label>
                <input type="text" class="form-control" id="otras_caracteristicas" placeholder="" name="otras_caracteristicas" required/>

            </div>

            <div class="col-md-1">
                <label for="garantia" class="form-label">
                    Garantía
                </label>
                <select id="clase" class="custom-select" id="garantia" placeholder="" name="garantia" required>
                    <option selected></option>
                    <option>SI</option>
                    <option>NO</option>
                    <option>N/A</option>
                </select>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="fecha_inicio" class="form-label">
                    Fecha Inicio
                </label>
                <input type="date" class="form-control" id="fecha_inicio" placeholder="" name="fecha_inicio" required/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="fecha_fin" class="form-label">
                    Fecha de Terminación
                </label>
                <input type="date" class="form-control" id="fecha_fin" placeholder="" name="fecha_fin" required/>
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
