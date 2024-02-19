@extends('adminlte::page')

@section('title', 'Crear Vehiculos')

@section('content_header')

@section('css')
    <link rel="icon" href="{{ asset('img/icon.jpg') }}">
@stop

<div style="text-align: end;">
    <div style="background-color: #08b94e; display: inline-block; padding: 5px;">
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
            margin-top: 10px;
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
            <p style="margin: 0;"> 🔹Nuevo Vehiculo🔹</p>
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
        <form id="formulario" action="{{ route('administrativo.store_vehiculo') }}" method="POST" enctype="multipart/form-data" class="row g-3">
            <!-- esta linea requiere ruta Route::post('guias/create', 'store')->name(('guias.create'));  definida el routes guia-->

            @csrf


            <div class="col-12">
                <label for="text" class="form-label">
                    🔹INFORMACION GENERAL:
                </label>
            </div>

            <div class="col-md-2">
                <label for="placa" class="form-label">
                    Placa
                </label>
                <input type="text" class="form-control" id="placa" name="placa" required/>
            </div>

            <div class="col-md-2">
                <label for="linea" class="form-label">
                    Linea
                </label>
                <select id="linea" class="custom-select" name="linea" required>
                    <option selected></option>
                    <option>Hilux</option>
                    <option>Amarok Trendline</option>
                    <option>Yaris Cross</option>
                    <option>Discover 125</option>
                    <option>4300</option>
                    <option>Gh8jm8a</option>
                    <option>Dxk1021tk9 1.5</option>
                    <option>Eq1021nf33 1.2</option>
                    <option>Xzu710l - Qkfmp3</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="clase" class="form-label">
                    Clase
                </label>
                <select id="clase" class="custom-select" name="clase" required>
                    <option selected></option>
                    <option>Camioneta</option>
                    <option>Camion</option>
                    <option>Motocicleta</option>
                    <option>Grua</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="marca" class="form-label">
                    Marca
                </label>
                <select id="marca" class="custom-select" name="marca" required>
                    <option selected></option>
                    <option>Toyota</option>
                    <option>DFSK</option>
                    <option>HINO</option>
                    <option>BAJAJ</option>
                    <option>INTERNATIONAL</option>
                </select>
            </div>

            <div class="col-2">
                <label for="color" class="form-label">
                    Color
                </label>
                <select id="color" class="custom-select" name="color" required>
                    <option selected></option>
                    <option>Blanco</option>
                    <option>Negro</option>
                    <option>Azul</option>
                </select>
            </div>
            <div class="col-2">
                <label for="chasis" class="form-label">
                    # Chasis
                </label>
                <input type="text" class="form-control" id="chasis" placeholder="" name="chasis" required/>
            </div>
            <div class="col-2">
                <label for="motor" class="form-label">
                    # Motor
                </label>
                <input type="text" class="form-control" id="motor" placeholder="" name="motor" required/>
            </div>
            <div class="col-2">
                <label for="cilindraje" class="form-label">
                    Cilindraje
                </label>
                <select id="cilindraje" class="custom-select" name="cilindraje" required>
                    <option selected></option>
                    <option>1600 cc</option>
                    <option>1500 cc</option>
                    <option>1400 cc</option>
                    <option>1200 cc</option>
                </select>
            </div>
            <div class="col-2">
                <label for="uso_vehiculo" class="form-label">
                    Uso del vehiculo
                </label>
                <select id="uso_vehiculo" class="custom-select" name="uso_vehiculo" required>
                    <option selected></option>
                    <option>Particular</option>
                    <option>Servicio Publico</option>
                </select>
            </div>
            <div class="col-2">
                <label for="modelo" class="form-label">
                    Modelo
                </label>
                <select id="modelo" class="custom-select" name="modelo" required>
                    <option selected></option>
                    <option>2023</option>
                    <option>2022</option>
                    <option>2021</option>
                    <option>2020</option>
                    <option>2019</option>
                    <option>2018</option>
                    <option>2017</option>
                    <option>2016</option>
                    <option>2015</option>
                    <option>2014</option>
                    <option>2013</option>
                    <option>2012</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="fecha_soat" class="form-label">
                Fecha SOAT
                </label>
                <input type="date" class="form-control" id="fecha_soat" name="fecha_soat" min="{{ \Carbon\Carbon::now()->toDateString() }}" required/>
            </div>
           
            <div class="col-md-2">
                <label for="fecha_fin" class="form-label">
                Fecha Vecimiento SOAT
                </label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" min="{{ \Carbon\Carbon::now()->toDateString() }}" required/>
            </div>

            <br>

            <div class="form-group col-md-2">
                <label for="img">
                    Cargar Imagén
                </label>
                <input type="file" name="img" class="form-control" id="img">
            </div>

            <div class="col-12">
                <br>
                <label for="text" class="form-label">
                    🔹REVISION TECNICOMECANICA FECHA DE VENCIMIENTO:
                </label>
            </div>
            <div class="col-md-4">
                <label for="fecha_tecnomecanica" class="form-label">
                Tecnomecanica Fecha
                </label>
                <input type="date" class="form-control" id="fecha_tecnomecanica" name="fecha_tecnomecanica" min="{{ \Carbon\Carbon::now()->toDateString() }}" required/>
            </div>
            <div class="col-4">
                <label for="licencia" class="form-label">
                    Liciencia Transito
                </label>
                <input type="text" class="form-control" id="licencia" placeholder="" name="licencia" required>

            </div>

            <div class="col-12">
                <br>
                <label for="text" class="form-label">
                    🔹DIRECCION - TRASMISIÓN - SUSPENSIÓN:
                </label>
            </div>
            <div class="col-md-2">
                <label for="tipo_direccion" class="form-label">
                    Tipo Direcionsss
                </label>
                <select id="clase" class="custom-select" id="tipo_direccion" placeholder="" name="tipo_direccion" required>
                    <option selected></option>
                    <option>mecánica</option>
                    <option>hidráulica</option>
                </select>
            </div>
            <div class="col-2">
                <label for="tipo_transmision" class="form-label">
                    Tipo de Transmisión
                </label>
                <select id="clase" class="custom-select" id="tipo_transmision" placeholder="" name="tipo_transmision" required>
                    <option selected></option>
                    <option>Transmisión manual</option>
                    <option>Transmisión automática</option>
                    <option>Transmisión semiautomática</option>
                    <option>Transmisión manual automatizada</option>
                    <option>Transmisión eléctrica de una velocidad</option>
                </select>
            </div>
            <div class="col-2">
                <label for="numero_velocidades" class="form-label">
                    Numero de velocidades
                </label>
                <select id="clase" class="custom-select" id="numero_velocidades" placeholder="" name="numero_velocidades" required>
                    <option selected></option>
                    <option>4 velocidades</option>
                    <option>5 velocidades</option>
                    <option>6 velocidades</option>
                    <option>7 velocidades</option>
                    <option>8 velocidades</option>
                    <option>9 velocidades</option>
                    <option>10 velocidades</option>
                    <option>11 velocidades</option>
                    <option>12 velocidades (y más, en algunas transmisiones automáticas de alta gama)</option>
                </select>
            </div>
            <div class="col-2">
                <label for="tipo_rodamiento" class="form-label">
                    Tipo de rodamiento
                </label>
                <select id="clase" class="custom-select" id="tipo_rodamiento" placeholder="" name="tipo_rodamiento" required>
                    <option selected></option>
                    <option>Rodamientos de rueda</option>
                    <option>Rodamientos de transmisión</option>
                    <option>Rodamientos de motor</option>
                    <option>Rodamientos de compresor de aire acondicionado</option>
                    <option>Rodamientos de dirección</option>
                    <option>Rodamientos de bomba de agua.</option>
                </select>
            </div>
            <div class="col-2">
                <label for="suspencion_delantera" class="form-label">
                    Suspención Delantera
                </label>
                <select id="clase" class="custom-select" id="suspencion_delantera" placeholder="" name="suspencion_delantera" required>
                    <option selected></option>
                    <option>Suspención Rigidas</option>
                    <option>Suspención Dependientes</option>
                </select>
            </div>
            <div class="col-2">
                <label for="suspension_trasera" class="form-label">
                    Suspención Trasera
                </label>
                <select id="clase" class="custom-select" id="suspension_trasera" placeholder="" name="suspension_trasera" required>
                    <option selected></option>
                    <option>Suspención Rigidas</option>
                    <option>Suspención Dependientes</option>
                </select>
            </div>
            <div class="col-2">
                <label for="numero_llantas" class="form-label">
                    Numero LLantas
                </label>
                <select id="clase" class="custom-select" id="numero_llantas" placeholder="" name="numero_llantas" required>
                    <option selected></option>
                    <option>6</option>
                    <option>5</option>
                    <option>2</option>
                </select>
            </div>
            <div class="col-2">
                <label for="dimensiones_rines" class="form-label">
                    Dimensión de rines
                </label>
                <select id="clase" class="custom-select" id="dimensiones_rines" placeholder="" name="dimensiones_rines" required>
                    <option selected></option>
                    <option>16 pulgadas</option>
                    <option>17 pulgadas</option>
                    <option>18 pulgadas</option>
                    <option>19 pulgadas</option>
                    <option>20 pulgadas</option>
                    <option>21 pulgadas</option>
                    <option>22 pulgadas</option>
                    <option>23 pulgadas</option>
                    <option>24 pulgadas</option>

                </select>
            </div>
            <div class="col-2">
                <label for="material_rines" class="form-label">
                    Material de rines
                </label>
                <select id="clase" class="custom-select" id="material_rines" placeholder="" name="material_rines" required>
                    <option selected></option>
                    <option>Aleación de Aluminio</option>
                    <option>Acero</option>
                    <option>Magnesio</option>
                    <option>Fibra de Carbono</option>
                    <option>Híbridos o Compuestos</option>
                    <option>Plástico Reforzado con Fibra (PRF)</option>
                    <option>Acero Inoxidable</option>
                    <option>Titanio</option>
                    <option>Rines Forjados</option>

                </select>
            </div>
            <div class="col-12">
                <br>
                <label for="text" class="form-label">
                    🔹FRENOS:
                </label>
            </div>
            <div class="col-4">
                <label for="tipo_frenos_delanteros" class="form-label">
                    Tipo de frenos delanteros
                </label>
                <select id="clase" class="custom-select" id="tipo_frenos_delanteros" placeholder="" name="tipo_frenos_delanteros" required>
                    <option selected></option>
                    <option>Disco</option>
                    <option>Tambor</option>
                    <option>A.B.S</option>
                </select>
            </div>
            <div class="col-4">
                <label for="tipo_frenos_traseros" class="form-label">
                    Tipo de frenos traseros
                </label>
                <select id="clase" class="custom-select" id="tipo_frenos_traseros" placeholder="" name="tipo_frenos_traseros" required>
                    <option selected></option>
                    <option>Disco</option>
                    <option>Tambor</option>
                    <option>A.B.S</option>
                </select>
            </div>
            <div class="col-12">
                <br>
                <label for="text" class="form-label">
                    🔹CARROCERIA:
                </label>
            </div>
            <div class="col-4">
                <label for="numero_serie" class="form-label">
                    Numero Serie
                </label>
                <input type="text" class="form-control" id="numero_serie" placeholder="" name="numero_serie" required/>
            </div>
            <div class="col-4">
                <label for="numero_ventanas" class="form-label">
                    Numero de ventanas
                </label>
                <select id="clase" class="custom-select" id="numero_ventanas" placeholder="" name="numero_ventanas" required>
                    <option selected></option>
                    <option>3</option>
                    <option>4</option>
                    <option>6</option>
                    <option>N/A</option>
                </select>
            </div>
            <div class="col-4">
                <label for="capacidad_carga" class="form-label">
                    Capacidad de carga | Pasajeros
                </label>
                <select id="clase" class="custom-select" id="capacidad_carga" placeholder="" name="capacidad_carga" required>
                    <option selected></option>
                    <option>2</option>
                    <option>5</option>
                </select>
            </div>
            <div class="col-12">
                <br>
                <label for="text" class="form-label">
                    🔹DOTACION VEHICULO | EQUIPO DE CARRETERA
                </label>
            </div>
            <div class="col-md-4">
                <div class="dotacion-container">
                    <h6>Selecione dotacion del vehiculo</h6>
                    <input type="checkbox" name="dotacion[]" value="llaves">
                    <label for="examen_a">Llaves</label><br>
                    <input type="checkbox" name="dotacion[]" value="destornilladores">
                    <label for="examen_b">Destornilladores</label><br>
                    <input type="checkbox" name="dotacion[]" value="gato">
                    <label for="examen_c">Gato</label><br>
                    <input type="checkbox" name="dotacion[]" value="alicates">
                    <label for="examen_a">Aplicates</label><br>
                    <input type="checkbox" name="dotacion[]" value="extintor">
                    <label for="examen_b">Extintor</label><br>
                    <input type="checkbox" name="edotacion[]" value="tacos">
                    <label for="examen_c">Tacos</label><br>
                    <input type="checkbox" name="dotacion[]" value="linterna">
                    <label for="examen_c">Linterna</label>
                </div>
            </div>

            <div class="col-md-4">
                <div class="equipo-container">
                    <h6>Selecione Equipos de carretera</h6>
                    <input type="checkbox" name="equipo_carretera[]" value="conos">
                    <label for="examen_a">Conos</label><br>
                    <input type="checkbox" name="equipo_carretera[]" value="pendones_viales">
                    <label for="examen_b">Pendones viales</label><br>
                    <input type="checkbox" name="equipo_carretera[]" value="baston_luminoso">
                    <label for="examen_c">Baston Luminoso</label><br>
                    <input type="checkbox" name="equipo_carretera[]" value="llanta_emergencia">
                    <label for="examen_a">Llanta de emergencia</label><br>
                    <input type="checkbox" name="equipo_carretera[]" value="cruceta">
                    <label for="examen_b">Cruceta</label><br>
                    <input type="checkbox" name="equipo_carretera[]" value="botiquin">
                    <label for="examen_c">Botiquin</label><br>
                  </div>
            </div>
            <div class="col-12">
            </div>
            <br>
            <div class="box-footer" style="margin-bottom: 25px;">
                <button type="submit" class="btn btn-dark" id="guardar-btn">Guardar</button>
            </div>
        </form>

@stop

@section('js')

@stop
