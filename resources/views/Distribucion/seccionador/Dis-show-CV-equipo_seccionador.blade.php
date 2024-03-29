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
            height: 570px; /* Puedes ajustar el tamaño según tus necesidades */
            overflow: auto; /* Agrega una barra de desplazamiento si el contenido es demasiado largo */
        }
                  /* Estilos para el botón moderno */
        .boton-moderno {
            padding: 10px 20px; /* Ajusta el relleno según tus necesidades */
            font-size: 16px;   /* Ajusta el tamaño de fuente según tus necesidades */
            border: none;
            background-color: #4CAF50; /* Color de fondo del botón */
            color: white;              /* Color del texto del botón */
            border-radius: 5px;        /* Radio de borde para esquinas redondeadas */
            cursor: pointer;
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
        #tabla{
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
                🔹IDENTIFICACIÓN Y ESPECIFICACIONES DEL EQUIPO
                </label>
            </div>

            <div class="col-2" style="with:30px">
                 <img src="{{ asset($equipo->img_dis) }}" style=" with: 30px; height: 100px;" >  <!--- esta esla ruta definida en el controlador --->
            </div>

            <div class="col-md-2">
                <label for="nombre_equipo" class="form-label">
                    Nombre tecnico del equipo
                </label>

                <input type="text" class="form-control" id="nombre_equipo" name="nombre_equipo" value="{{$equipo->nombre_equipo}}" disabled >

            </div>

            <div class="col-md-2">
                <label for="ubicacion_equipo" class="form-label">
                    Ubicación del equipo
                </label>
                <select id="ubicacion_equipo" class="custom-select" id="ubicacion_equipo" name="ubicacion_equipo" disabled>
                    <option selected=""></option>
                    <option value="Sede PA" {{ $equipo->ubicacion_equipo == 'Sede PA' ? 'selected' : '' }}>Sede PA</option>
                    <option value="Sede VG" {{ $equipo->ubicacion_equipo == 'Sede VG' ? 'selected' : '' }}>Sede VG</option>
                    <option value="Sede Caicedo" {{ $equipo->ubicacion_equipo == 'Sede Caicedo' ? 'selected' : '' }}>Sede Caicedo</option>
                    <option value="Sede la Dorada" {{ $equipo->ubicacion_equipo == 'Sede la Dorada' ? 'selected' : '' }}>Sede la Dorada</option>
                    <option value="Subestacione PA" {{ $equipo->ubicacion_equipo == 'Subestacione PA' ? 'selected' : '' }}>Subestacione PA</option>
                    <option value="Subestacion PC" {{ $equipo->ubicacion_equipo == 'Subestacion PC' ? 'selected' : '' }}>Subestacion PC</option>
                    <option value="Subestacion Yarumo" {{ $equipo->ubicacion_equipo == 'Subestacion Yarumo' ? 'selected' : '' }}>Subestacion Yarumo</option>
                    <option value="Subestacion la Hormiga" {{ $equipo->ubicacion_equipo == 'Subestacion la Hormiga' ? 'selected' : '' }}>Subestacion la Hormiga</option>
                    <!-- Agrega más opciones según sea necesario -->
                </select>
            </div>


            <div class="col-md-2">
                <label for="estado" class="form-label">
                    Estado
                </label>
                <select id="estado" class="custom-select" id="estado"  name="estado" disabled>
                    <option selected=""></option>
                    <option value="Nuevo" {{ $equipo->estado == 'Nuevo' ? 'selected' : '' }}>Nuevo</option>
                    <option value="En uso" {{ $equipo->estado == 'En uso' ? 'selected' : '' }}>En uso</option>
                    <option value="Fuera de servicio" {{ $equipo->estado == 'Fuera de servicio' ? 'selected' : '' }}>Fuera de servicio</option>
                    <option value="En mantenimiento" {{ $equipo->estado == 'En mantenimiento' ? 'selected' : '' }}>En mantenimiento</option>
                    <option value="Para disposición final" {{ $equipo->estado == 'Para disposición final' ? 'selected' : '' }}>Para disposición final</option>
                    <!-- Agrega más opciones según sea necesario -->
                </select>

            </div>

            <div class="col-md-2">
                <label for="fecha_fabrica" class="form-label">
                    Fecha de fabrica
                </label>
                <input type="date" class="form-control" id="fecha_fabrica" placeholder="" name="fecha_fabrica" value="{{$equipo->fecha_fabrica}}"  disabled/>
            </div>

            <div class="col-md-2">
                <label for="marca" class="form-label">
                    Marca
                </label>
                <select id="marca" class="custom-select" id="marca" placeholder="" name="marca" disabled>
                    <option selected=""></option>
                    <option value="Nuevo uso" {{ $equipo->marca == 'Nuevo uso' ? 'selected' : '' }}>Nuevo uso</option>
                    <option value="Dimanik" {{ $equipo->marca == 'Dimanik' ? 'selected' : '' }}>Dimanik</option>
                    <option value="Link tech" {{ $equipo->marca == 'Link tech' ? 'selected' : '' }}>Link tech</option>
                    <option value="Insafe" {{ $equipo->marca == 'Insafe' ? 'selected' : '' }}>Insafe</option>
                    <option value="Sosega" {{ $equipo->marca == 'Sosega' ? 'selected' : '' }}>Sosega</option>
                    <option value="Yoke" {{ $equipo->marca == 'Yoke' ? 'selected' : '' }}>Yoke</option>
                    <option value="Petzel" {{ $equipo->marca == 'Petzel' ? 'selected' : '' }}>Petzel</option>
                    <option value="Armadura" {{ $equipo->marca == 'Armadura' ? 'selected' : '' }}>Armadura</option>
                    <option value="3M" {{ $equipo->marca == '3M' ? 'selected' : '' }}>3M</option>
                    <option value="Ecolift" {{ $equipo->marca == 'Ecolift' ? 'selected' : '' }}>Ecolift</option>
                    <option value="Arseg" {{ $equipo->marca == 'Arseg' ? 'selected' : '' }}>Arseg</option>
                    <option value="Delta Plus" {{ $equipo->marca == 'Delta Plus' ? 'selected' : '' }}>Delta Plus</option>
                    <option value="Regeltex" {{ $equipo->marca == 'Regeltex' ? 'selected' : '' }}>Regeltex</option>
                    <option value="Iproteccion" {{ $equipo->marca == 'Iproteccion' ? 'selected' : '' }}>Iproteccion</option>
                    <option value="Alcovisor" {{ $equipo->marca == 'Alcovisor' ? 'selected' : '' }}>Alcovisor</option>
                    <option value="DR Meter" {{ $equipo->marca == 'DR Meter' ? 'selected' : '' }}>DR Meter</option>
                    <option value="Gil" {{ $equipo->marca == 'Gil' ? 'selected' : '' }}>Gil</option>
                    <option value="GH Voltaje" {{ $equipo->marca == 'GH Voltaje' ? 'selected' : '' }}>GH Voltaje</option>
                    <!-- Agrega más opciones según sea necesario -->
                </select>

            </div>



            <div class="col-2">
                <label for="modelo" class="form-label">
                    Modelo
                </label>
                <input type="text" class="form-control" id="modelo" placeholder="" name="modelo" value="{{$equipo->modelo}}" disabled/>
            </div>
            <div class="col-2">
                <label for="no_serie" class="form-label">
                    No. Serie
                </label>
                <input type="text" class="form-control" id="no_serie" placeholder="" name="no_serie" value="{{$equipo->no_serie}}" disabled/>
            </div>
            <div class="col-2">
                <label for="no_lote" class="form-label">
                    No. Lote
                </label>
                <input type="text" class="form-control" id="no_lote" placeholder="" name="no_lote" value="{{$equipo->no_lote}}" disabled/>
            </div>
            <div class="col-2">
                <label for="no_activo" class="form-label">
                    No. de activo fijo
                </label>
                <input type="text" class="form-control" id="no_activo" placeholder="" name="no_activo" value="{{$equipo->no_activo}}" disabled/>
            </div>

            <div class="col-2">
                <label for="codigo" class="form-label">
                    Codigo
                </label>
                <input type="text" class="form-control" id="codigo" placeholder="" name="codigo" value="{{$equipo->codigo}}" disabled/>
            </div>

            <div class="col-2">
                <label for="fecha_ensayo" class="form-label">
                    Fecha del ensayo dieléctrico
                </label>
                <input type="date" class="form-control" id="fecha_ensayo" placeholder="" name="fecha_ensayo" value="{{$equipo->fecha_ensayo}}" disabled/>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="validez" class="form-label">
                    Validez
                </label>
                <select id="clase" class="custom-select" id="validez" placeholder="" name="validez" disabled>
                    <option selected=""></option>
                    <option value="1" {{ $equipo->validez == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ $equipo->validez == '2' ? 'selected' : '' }}>2</option>
                    <option value="3" {{ $equipo->validez == '3' ? 'selected' : '' }}>3</option>
                    <option value="Mayor3" {{ $equipo->validez == 'Mayor3' ? 'selected' : '' }}>Mayor a 3</option>
                    <!-- Agrega más opciones según sea necesario -->
                </select>
            </div>


            <div class="col-2" style="text-align: left;">
                <label for="fecha_conformidad" class="form-label">
                    Fecha de conformidad
                </label>
                <input type="date" class="form-control" id="fecha_conformidad" placeholder="" name="fecha_conformidad" value="{{$equipo->fecha_conformidad}}" disabled/>

            </div>

            <div class="col-2" style="text-align: left;">
                <label for="fecha_operacion" class="form-label">
                    Fecha Inicio Operación
                </label>
                <input type="date" class="form-control" id="fecha_operacion" placeholder="" name="fecha_operacion" value="{{$equipo->fecha_operacion}}" disabled/>

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
                <input type="text" class="form-control" id="nombre_responsable" placeholder="" name="nombre_responsable" value="{{$equipo->nombre_responsable}}" disabled/>

            </div>
            <div class="col-2"style="text-align: left;">
                <label for="cargo" class="form-label">
                    Cargo
                </label>
                <input type="text" class="form-control" id="cargo" placeholder="" name="cargo" value="{{$equipo->cargo}}" disabled/>

            </div>

            <div class="col-md-2">
                <label for="lugar_proceso" class="form-label">
                    Lugar o Proceso
                </label>
                <select id="clase" class="custom-select" id="lugar_proceso" placeholder="" name="lugar_proceso" disabled>
                    <option selected></option>
                    <option value="Almacén" {{ $equipo->lugar_proceso == 'Almacén' ? 'selected' : '' }}>Almacén</option>
                    <option value="Bodega" {{ $equipo->lugar_proceso == 'Bodega' ? 'selected' : '' }}>Bodega</option>
                    <option value="Vehículo PAK175" {{ $equipo->lugar_proceso == 'Vehículo PAK175' ? 'selected' : '' }}>Vehículo PAK175</option>
                    <option value="PAK176" {{ $equipo->lugar_proceso == 'PAK176' ? 'selected' : '' }}>PAK176</option>
                    <option value="Vehículo PAK178" {{ $equipo->lugar_proceso == 'Vehículo PAK178' ? 'selected' : '' }}>Vehículo PAK178</option>
                    <option value="Vehículo PAK 169" {{ $equipo->lugar_proceso == 'Vehículo PAK 169' ? 'selected' : '' }}>Vehículo PAK 169</option>
                    <option value="Vehículo  PAK167" {{ $equipo->lugar_proceso == 'Vehículo  PAK167' ? 'selected' : '' }}>Vehículo PAK167</option>
                    <option value="Vehículo LFL640" {{ $equipo->lugar_proceso == 'Vehículo LFL640' ? 'selected' : '' }}>Vehículo LFL640</option>
                    <option value="Vehículo PAK172" {{ $equipo->lugar_proceso == 'Vehículo PAK172' ? 'selected' : '' }}>Vehículo PAK172</option>
                    <option value="Vehículo PAK171" {{ $equipo->lugar_proceso == 'Vehículo PAK171' ? 'selected' : '' }}>Vehículo PAK171</option>
                    <option value="Vehículo PAK170" {{ $equipo->lugar_proceso == 'Vehículo PAK170' ? 'selected' : '' }}>Vehículo PAK170</option>
                    <option value="Vehículo AVI892" {{ $equipo->lugar_proceso == 'Vehículo AVI892' ? 'selected' : '' }}>Vehículo AVI892</option>
                    <option value="Vehículo AVA496" {{ $equipo->lugar_proceso == 'Vehículo AVA496' ? 'selected' : '' }}>Vehículo AVA496</option>
                    <option value="Vehículo JHD10F" {{ $equipo->lugar_proceso == 'Vehículo JHD10F' ? 'selected' : '' }}>Vehículo JHD10F</option>
                    <option value="cuadrilla 1" {{ $equipo->lugar_proceso == 'cuadrilla 1' ? 'selected' : '' }}>cuadrilla 1</option>
                    <option value="cuadrilla 2" {{ $equipo->lugar_proceso == 'cuadrilla 2' ? 'selected' : '' }}>cuadrilla 2</option>
                    <option value="cuadrilla 3" {{ $equipo->lugar_proceso == 'cuadrilla 3' ? 'selected' : '' }}>cuadrilla 3</option>
                    <option value="cuadrilla 4" {{ $equipo->lugar_proceso == 'cuadrilla 4' ? 'selected' : '' }}>cuadrilla 4</option>
                    <option value="SST" {{ $equipo->lugar_proceso == 'SST' ? 'selected' : '' }}>SST</option>
                    <option value="Talento Humano" {{ $equipo->lugar_proceso == 'Talento Humano' ? 'selected' : '' }}>Talento Humano</option>
                    <option value="Control de Energía" {{ $equipo->lugar_proceso == 'Control de Energía' ? 'selected' : '' }}>Control de Energía</option>
                    <!-- Agrega más opciones según sea necesario -->

                </select>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="fecha_entrega" class="form-label">
                    Fecha de entrega
                </label>
                <input type="date" class="form-control" id="fecha_entrega" placeholder="" name="fecha_entrega" value="{{$equipo->fecha_entrega}}"  disabled/>

            </div>

            <div class="col-2" style="text-align: left;">
                <label for="observacion_responsable" class="form-label">
                    Observaciones
                </label>
                <textarea type="text" class="form-control" rows="1" id="observacion_responsable" placeholder="" name="observacion_responsable" readonly>{{$equipo->observacion_responsable}}</textarea>

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
                <select id="clase" class="custom-select" id="fabricante" placeholder="" name="fabricante" disabled>
                    <option selected=""></option>
                    <option value="Sew" {{ $equipo->fabricante == 'Sew' ? 'selected' : '' }}>Sew</option>
                    <option value="Supersafe" {{ $equipo->fabricante == 'Supersafe' ? 'selected' : '' }}>Supersafe</option>
                    <option value="WJ Rescates" {{ $equipo->fabricante == 'WJ Rescates' ? 'selected' : '' }}>WJ Rescates</option>
                    <option value="Dinamik" {{ $equipo->fabricante == 'Dinamik' ? 'selected' : '' }}>Dinamik</option>
                    <option value="Steelpro" {{ $equipo->fabricante == 'Steelpro' ? 'selected' : '' }}>Steelpro</option>
                    <option value="Petzel" {{ $equipo->fabricante == 'Petzel' ? 'selected' : '' }}>Petzel</option>
                    <option value="Alcovisor" {{ $equipo->fabricante == 'Alcovisor' ? 'selected' : '' }}>Alcovisor</option>
                    <option value="Hastings" {{ $equipo->fabricante == 'Hastings' ? 'selected' : '' }}>Hastings</option>
                    <option value="Regeltex" {{ $equipo->fabricante == 'Regeltex' ? 'selected' : '' }}>Regeltex</option>
                    <option value="Super safe" {{ $equipo->fabricante == 'Super safe' ? 'selected' : '' }}>Super safe</option>
                    <!-- Agrega más opciones según sea necesario -->
                </select>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="fecha_adquisicion" class="form-label">
                    Fecha de adquisición
                </label>
                <input type="date" class="form-control" id="fecha_adquisicion" placeholder="" name="fecha_adquisicion" value="{{$equipo->fecha_adquisicoon}}" disabled/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="nombre_proveedor" class="form-label">
                    Nombre
                </label>
                <input type="text" class="form-control" id="nombre_proveedor" placeholder="" name="nombre_proveedor" value="{{$equipo->nombre_proveedor}}" disabled/>

            </div>


            <div class="col-2" style="text-align: left;">
                <label for="direccion_proveedor" class="form-label">
                    Dirección
                </label>
                <input type="text" class="form-control" id="direccion_proveedor" placeholder="" name="direccion_proveedor" value="{{ $equipo->direccion_proveedor }}" disabled/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="email_proveedor" class="form-label">
                    E-mail
                </label>
                <input type="text" class="form-control" id="email_proveedor" placeholder="" name="email_proveedor" value="{{ $equipo->email_proveedor }}" disabled/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="telefono_proveedor" class="form-label">
                    Telefono
                </label>
                <input type="text" class="form-control" id="telefono_proveedor" placeholder="" name="telefono_proveedor" value="{{ $equipo->telefono_proveedor }}" disabled/>

            </div>
            <div class="col-1" style="text-align: left;">
                <label for="catalogo" class="form-label">
                    Posee catálogo de manejo OP
                </label>
                <select id="clase" class="custom-select" id="catalogo" placeholder="" name="catalogo" disabled>
                    <option selected=""></option>
                    <option value="SI" {{ $equipo->catalogo == 'SI' ? 'selected' : '' }}>SI</option>
                    <option value="SI" {{ $equipo->catalogo == 'NO' ? 'selected' : '' }}>SI</option>
                </select>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="mantenimiento_recomendado" class="form-label">
                    <br>
                    Mantenimiento recomendado
                </label>
                <select id="clase" class="custom-select" id="mantenimiento_recomendado" placeholder="" name="mantenimiento_recomendado" disabled>
                    <option selected=""></option>
                    <option value="Preventivo" {{ $equipo->mantenimiento_recomendado == 'Preventivo' ? 'selected' : '' }}>Preventivo</option>
                    <option value="Inspección" {{ $equipo->mantenimiento_recomendado == 'Inspección' ? 'selected' : '' }}>Inspección</option>
                    <option value="Verificación" {{ $equipo->mantenimiento_recomendado == 'Verificación' ? 'selected' : '' }}>Verificación</option>
                    <option value="Ensayo" {{ $equipo->mantenimiento_recomendado == 'Ensayo' ? 'selected' : '' }}>Ensayo</option>
                    <option value="Calibración" {{ $equipo->mantenimiento_recomendado == 'Calibración' ? 'selected' : '' }}>Calibración</option>
                </select>

            </div>

            <div class="col-2" style="text-align: left;">
                <label for="condiciones_operacion" class="form-label"> <br>
                    Condiciones de operación:
                </label>
                <input type="text" class="form-control" id="condiciones_operacion" placeholder="" name="condiciones_operacion" value="{{ $equipo->condiciones_operacion }}" disabled/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="observacion_fabricante" class="form-label"> <br>
                    Observaciones
                </label>
                <textarea type="text" class="form-control" rows="1" id="observacion_fabricante" placeholder="" name="observacion_fabricante" disabled>
                    <?php echo htmlspecialchars($equipo->observacion_fabricante); ?>
                </textarea>

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
                <input type="text" class="form-control" id="medicion" placeholder="" name="medicion" value="{{ $equipo->medicion }}" disabled/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="rango_uso" class="form-label">
                    Rango de Uso
                </label>
                <input type="text" class="form-control" id="rango_uso" placeholder="" name="rango_uso" value="{{ $equipo->rango_uso }}" disabled/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="resolucion" class="form-label">
                    Resolución
                </label>
                <input type="text" class="form-control" id="resolucion" placeholder="" name="resolucion" value="{{ $equipo->resolucion }}" disabled/>

            </div>

            <div class="col-2" style="text-align: left;">
                <label for="exactitud" class="form-label">
                    Exactitud
                </label>
                <input type="text" class="form-control" id="exactitud" placeholder="" name="exactitud" value="{{ $equipo->exactitud }}" disabled/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="fecha_calibracion" class="form-label">
                    Frecuencia de Calibración
                </label>
                <input type="text" class="form-control" id="fecha_calibracion" placeholder="" name="fecha_calibracion" value="{{ $equipo->fecha_calibracion }}" disabled/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="fecha_verificacion" class="form-label">
                    Frecuencia de Verificación
                </label>
                <input type="text" class="form-control" id="fecha_verificacion" placeholder="" name="fecha_verificacion" value="{{ $equipo->fecha_verificacion }}" disabled/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="patrones" class="form-label">
                    Patrones
                </label>
                <input type="text" class="form-control" id="patrones" placeholder="" name="patrones" value="{{ $equipo->patrones }}" disabled/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="estandares" class="form-label">
                    Estándares
                </label>
                <input type="text" class="form-control" id="estandares" placeholder="" name="estandares" value="{{ $equipo->estandares }}" disabled/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="regulaciones" class="form-label">
                    Regulaciones
                </label>
                <input type="text" class="form-control" id="regulaciones" placeholder="" name="regulaciones" value="{{ $equipo->regulaciones }}" disabled/>

            </div>

            <div class="col-2" style="text-align: left;">
                <label for="otras_caracteristicas" class="form-label">
                    Otras características
                </label>
                <input type="text" class="form-control" id="otras_caracteristicas" placeholder="" name="otras_caracteristicas" value="{{ $equipo->otras_caracteristicas }}" disabled/>

            </div>

            <div class="col-md-1">
                <label for="garantia" class="form-label">
                    Garantía
                </label>
                <select id="garantia" class="custom-select" placeholder="" name="garantia" disabled>
                    <option selected></option>
                    <option value="SI" {{ $equipo->garantia == 'SI' ? 'selected' : '' }}>SI</option>
                    <option value="NO" {{ $equipo->garantia == 'NO' ? 'selected' : '' }}>NO</option>
                    <option value="N/A" {{ $equipo->garantia == 'N/A' ? 'selected' : '' }}>N/A</option>
                </select>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="fecha_inicio" class="form-label">
                    Fecha Inicio
                </label>
                <input type="date" class="form-control" id="fecha_inicio" placeholder="" name="fecha_inicio" value="{{ $equipo->fecha_inicio }}" disabled/>

            </div>
            <div class="col-2" style="text-align: left;">
                <label for="fecha_fin" class="form-label">
                    Fecha de Terminación
                </label>
                <input type="date" class="form-control" id="fecha_fin" placeholder="" name="fecha_fin" value="{{ $equipo->fecha_fin }}" disabled/><br>
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
