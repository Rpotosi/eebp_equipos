@extends('adminlte::page')

@section('title', 'vehiculos')

@section('content_header')

    <div style="text-align: end;">
        <div style="background-color: #f6c21e; display: inline-block; padding: 5px;">
            <p style="margin: 0;"><b>Bienvenido: 
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
            padding: 3%;         
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
    <h1 style="text-align: center">Mantenimiento Vehiculos</h1>
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
            <!-- esta linea requiere ruta Route::post('guias/create', 'store')->name(('guias.create'));  definida el routes guia-->
            


            <div class="col-12">
                <label for="text" class="form-label">
                    🔹INFORMACION GENERAL:
                </label>
            </div>

            <div class="col-md-2">
                <label for="placa" class="form-label">
                    Placa
                </label>
                <input type="text" class="form-control" id="placa" name="placa" value="{{ $vehiculo->placa }}" disabled/>
            </div>

            <div class="col-md-2">
                <label for="linea" class="form-label">
                    Linea
                </label>
                <select id="linea" class="custom-select" name="linea" disabled>
                    <option selected></option>
                    <option value="Hilux" {{ $vehiculo->linea == 'Hilux' ? 'selected' : '' }}>Hilux</option>
                    <option value="Amarok Trendline" {{ $vehiculo->linea == 'Amarok Trendline' ? 'selected' : '' }}>Amarok Trendline</option>
                    <option value="Yaris Cross" {{ $vehiculo->linea == 'Yaris Cross' ? 'selected' : '' }}>Yaris Cross</option>
                    <option value="Discover 125" {{ $vehiculo->linea == 'Discover 125' ? 'selected' : '' }}>Discover 125</option>
                    <option value="4300" {{ $vehiculo->linea == '4300' ? 'selected' : '' }}>4300</option>
                    <option value="Gh8jm8a" {{ $vehiculo->linea == 'Gh8jm8a' ? 'selected' : '' }}>Gh8jm8a</option>
                    <option value="Dxk1021tk9 1.5" {{ $vehiculo->linea == 'Dxk1021tk9 1.5' ? 'selected' : '' }}>Dxk1021tk9 1.5</option>
                    <option value="Eq1021nf33 1.2" {{ $vehiculo->linea == 'Eq1021nf33 1.2' ? 'selected' : '' }}>Eq1021nf33 1.2</option>
                    <option value="Xzu710l - Qkfmp3" {{ $vehiculo->linea == 'Xzu710l - Qkfmp3' ? 'selected' : '' }}>Xzu710l - Qkfmp3</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="clase" class="form-label">
                    Clase
                </label>
                <select id="clase" class="custom-select" name="clase" disabled>
                    <option selected></option>
                    <option value="Camioneta" {{ $vehiculo->clase == 'Camioneta' ? 'selected' : '' }}>Camioneta</option>
                    <option value="Camion" {{ $vehiculo->clase == 'Camion' ? 'selected' : '' }}>Camion</option>
                    <option value="Motocicleta" {{ $vehiculo->clase == 'Motocicleta' ? 'selected' : '' }}>Motocicleta</option>
                    <option value="Grua" {{ $vehiculo->clase == 'Grua' ? 'selected' : '' }}>Grua</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="marca" class="form-label">
                    Marca
                </label>
                <select id="marca" class="custom-select" name="marca" disabled>
                    <option selected></option>
                    <option value="Toyota" {{ $vehiculo->marca == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                    <option value="DFSK" {{ $vehiculo->marca == 'DFSK' ? 'selected' : '' }}>DFSK</option>
                    <option value="HINO" {{ $vehiculo->marca == 'HINO' ? 'selected' : '' }}>HINO</option>
                    <option value="BAJAJ" {{ $vehiculo->marca == 'BAJAJ' ? 'selected' : '' }}>BAJAJ</option>
                    <option value="INTERNATIONAL" {{ $vehiculo->marca == 'INTERNATIONAL' ? 'selected' : '' }}>INTERNATIONAL</option>
                </select>
            </div>

            <div class="col-2">
                <label for="color" class="form-label">
                    Color
                </label>
                <select id="color" class="custom-select" name="color" disabled>
                    <option selected></option>
                    <option value="Blanco" {{ $vehiculo->color == 'Blanco' ? 'selected' : '' }}>Blanco</option>
                    <option value="Negro" {{ $vehiculo->color == 'Negro' ? 'selected' : '' }}>Negro</option>
                    <option value="Azul" {{ $vehiculo->color == 'Azul' ? 'selected' : '' }}>Azul</option>
                </select>
            </div>
            <div class="col-2">
                <label for="chasis" class="form-label">
                    # Chasis
                </label>
                <input type="text" class="form-control" id="chasis" placeholder="" name="chasis" value="{{ $vehiculo->chasis }}" disabled/>
            </div>
            <div class="col-2">
                <label for="motor" class="form-label">
                    # Motor
                </label>
                <input type="text" class="form-control" id="motor" placeholder="" name="motor" value="{{ $vehiculo->motor }}" disabled/>
            </div>
            <div class="col-2">
                <label for="cilindraje" class="form-label">
                    Cilindraje
                </label>
                <select id="cilindraje" class="custom-select" name="cilindraje" disabled>
                    <option selected></option>
                    <option value="1600 cc" {{ $vehiculo->cilindraje == '1600 cc' ? 'selected' : '' }}>1600 cc</option>
                    <option value="1500 cc" {{ $vehiculo->cilindraje == '1500 cc' ? 'selected' : '' }}>1500 cc</option>
                    <option value="1400 cc" {{ $vehiculo->cilindraje == '1400 cc' ? 'selected' : '' }}>1400 cc</option>
                    <option value="1200 cc" {{ $vehiculo->cilindraje == '1200 cc' ? 'selected' : '' }}>1200 cc</option>
                </select>
            </div>
            <div class="col-2">
                <label for="uso_vehiculo" class="form-label">
                    Uso del vehiculo
                </label>
                <select id="uso_vehiculo" class="custom-select" name="uso_vehiculo" disabled>
                    <option selected></option>
                    <option value="Particular" {{ $vehiculo->uso_vehiculo == 'Particular' ? 'selected' : '' }}>Particular</option>
                    <option value="Servicio Publico" {{ $vehiculo->uso_vehiculo == 'Servicio Publico' ? 'selected' : '' }}>Servicio Publico</option>
                </select>
            </div>
            <div class="col-2">
                <label for="modelo" class="form-label">
                    Modelo
                </label>
                <select id="modelo" class="custom-select" name="modelo" disabled>
                    <option selected></option>
                    <option value="2023" {{ $vehiculo->modelo == '2023' ? 'selected' : '' }}>2023</option>
                    <option value="2022" {{ $vehiculo->modelo == '2022' ? 'selected' : '' }}>2022</option>
                    <option value="2021" {{ $vehiculo->modelo == '2021' ? 'selected' : '' }}>2021</option>
                    <option value="2020" {{ $vehiculo->modelo == '2020' ? 'selected' : '' }}>2020</option>
                    <option value="2019" {{ $vehiculo->modelo == '2019' ? 'selected' : '' }}>2019</option>
                    <option value="2018" {{ $vehiculo->modelo == '2018' ? 'selected' : '' }}>2018</option>
                    <option value="2017" {{ $vehiculo->modelo == '2017' ? 'selected' : '' }}>2017</option>
                    <option value="2016" {{ $vehiculo->modelo == '2016' ? 'selected' : '' }}>2016</option>
                    <option value="2015" {{ $vehiculo->modelo == '2015' ? 'selected' : '' }}>2015</option>
                    <option value="2014" {{ $vehiculo->modelo == '2014' ? 'selected' : '' }}>2014</option>
                    <option value="2013" {{ $vehiculo->modelo == '2013' ? 'selected' : '' }}>2013</option>
                    <option value="2012" {{ $vehiculo->modelo == '2012' ? 'selected' : '' }}>2012</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="fecha" class="form-label">
                Fecha SOAT
                </label>
                <input type="date" class="form-control" id="fecha" name="fecha" min="{{ \Carbon\Carbon::now()->toDateString() }}" value="{{ $vehiculo->fecha }}" disabled/> 
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
                <input type="date" class="form-control" id="fecha_tecnomecanica" name="fecha_tecnomecanica" min="{{ \Carbon\Carbon::now()->toDateString() }}" value="{{ $vehiculo->fecha_tecnomecanica }}" disabled/> 
            </div>
            <div class="col-4">
                <label for="licencia" class="form-label">
                    Liciencia Transito
                </label>
                <input type="text" class="form-control" id="licencia" placeholder="" name="licencia" value="{{ $vehiculo->licencia }}" disabled>
              
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
                <select id="clase" class="custom-select" id="tipo_direccion" placeholder="" name="tipo_direccion" disabled>
                    <option selected></option>
                    <option value="mecánica" {{ $vehiculo->tipo_direccion == 'mecánica' ? 'selected' : '' }}>mecánica</option>
                    <option value="hidráulica" {{ $vehiculo->tipo_direccion == 'hidráulica' ? 'selected' : '' }}>hidráulica</option>
                </select>
            </div>
            <div class="col-2">
                <label for="tipo_transmision" class="form-label">
                    Tipo de Transmisión
                </label>
                <select id="clase" class="custom-select" id="tipo_transmision" placeholder="" name="tipo_transmision" disabled>
                    <option selected></option>
                    <option value="Transmisión manual" {{ $vehiculo->tipo_transmision == 'Transmisión manual' ? 'selected' : '' }}>Transmisión manual</option>
                    <option value="Transmisión automática" {{ $vehiculo->tipo_transmision == 'Transmisión automática' ? 'selected' : '' }}>Transmisión automática</option>
                    <option value="Transmisión semiautomática" {{ $vehiculo->tipo_transmision == 'Transmisión semiautomática' ? 'selected' : '' }}>Transmisión semiautomática</option>
                    <option value="Transmisión manual automatizada" {{ $vehiculo->tipo_transmision == 'Transmisión manual automatizada' ? 'selected' : '' }}>Transmisión manual automatizada</option>
                    <option value="Transmisión eléctrica de una velocidad" {{ $vehiculo->tipo_transmision == 'Transmisión eléctrica de una velocidad' ? 'selected' : '' }}>Transmisión eléctrica de una velocidad</option>
                </select>
            </div>
            <div class="col-2">
                <label for="numero_velocidades" class="form-label">
                    Numero de velocidades
                </label>
                <select id="clase" class="custom-select" id="numero_velocidades" placeholder="" name="numero_velocidades" disabled>
                    <option selected></option>
                    <option value="4 velocidades" {{ $vehiculo->numero_velocidades == '4 velocidades' ? 'selected' : '' }}>4 velocidades</option>
                    <option value="5 velocidades" {{ $vehiculo->numero_velocidades == '5 velocidades' ? 'selected' : '' }}>5 velocidades</option>
                    <option value="6 velocidades" {{ $vehiculo->numero_velocidades == '6 velocidades' ? 'selected' : '' }}>6 velocidades</option>
                    <option value="7 velocidades" {{ $vehiculo->numero_velocidades == '7 velocidades' ? 'selected' : '' }}>7 velocidades</option>
                    <option value="8 velocidades" {{ $vehiculo->numero_velocidades == '8 velocidades' ? 'selected' : '' }}>8 velocidades</option>
                    <option value="9 velocidades" {{ $vehiculo->numero_velocidades == '9 velocidades' ? 'selected' : '' }}>9 velocidades</option>
                    <option value="10 velocidades" {{ $vehiculo->numero_velocidades == '10 velocidades' ? 'selected' : '' }}>10 velocidades</option>
                    <option value="11 velocidades" {{ $vehiculo->numero_velocidades == '11 velocidades' ? 'selected' : '' }}>11 velocidades</option>
                    <option value="12 velocidades" {{ $vehiculo->numero_velocidades == '12 velocidades' ? 'selected' : '' }}>12 velocidades (y más, en algunas transmisiones automáticas de alta gama)</option>
                </select>
            </div>
            <div class="col-2">
                <label for="tipo_rodamiento" class="form-label">
                    Tipo de rodamiento
                </label>
                <select id="clase" class="custom-select" id="tipo_rodamiento" placeholder="" name="tipo_rodamiento" disabled>
                    <option selected></option>
                    <option value="Rodamientos de rueda" {{ $vehiculo->tipo_rodamiento == 'Rodamientos de rueda' ? 'selected' : '' }}>Rodamientos de rueda</option>
                    <option value="Rodamientos de transmisión" {{ $vehiculo->tipo_rodamiento == 'Rodamientos de transmisión' ? 'selected' : '' }}>Rodamientos de transmisión</option>
                    <option value="Rodamientos de motor" {{ $vehiculo->tipo_rodamiento == 'Rodamientos de motor' ? 'selected' : '' }}>Rodamientos de motor</option>
                    <option value="Rodamientos de compresor de aire acondicionado" {{ $vehiculo->tipo_rodamiento == 'Rodamientos de compresor de aire acondicionado' ? 'selected' : '' }}>Rodamientos de compresor de aire acondicionado</option>
                    <option value="Rodamientos de dirección" {{ $vehiculo->tipo_rodamiento == 'Rodamientos de dirección' ? 'selected' : '' }}>Rodamientos de dirección</option>
                    <option value="Rodamientos de bomba de agua." {{ $vehiculo->tipo_rodamiento == 'Rodamientos de bomba de agua.' ? 'selected' : '' }}>Rodamientos de bomba de agua.</option>
                </select>
            </div>
            <div class="col-2">
                <label for="suspencion_delantera" class="form-label">
                    Suspención Delantera
                </label>
                <select id="clase" class="custom-select" id="suspencion_delantera" placeholder="" name="suspencion_delantera" disabled>
                    <option selected></option>
                    <option value="Suspención Rigidas" {{ $vehiculo->suspencion_delantera == 'Suspención Rigidas' ? 'selected' : '' }}>Suspención Rigidas</option>
                    <option value="Suspención Dependientes" {{ $vehiculo->suspencion_delantera == 'Suspención Dependientes' ? 'selected' : '' }}>Suspención Dependientes</option>
                </select>
            </div>
            <div class="col-2">
                <label for="suspension_trasera" class="form-label">
                    Suspención Trasera
                </label>
                <select id="clase" class="custom-select" id="suspension_trasera" placeholder="" name="suspension_trasera" disabled>
                    <option selected></option>
                    <option value="Suspención Rigidas" {{ $vehiculo->suspension_trasera == 'Suspención Rigidas' ? 'selected' : '' }}>Suspención Rigidas</option>
                    <option value="Suspención Dependientes" {{ $vehiculo->suspencion_trasera == 'Suspención Dependientes' ? 'selected' : '' }}>Suspención Dependientes</option>
                </select>
            </div>
            <div class="col-2">
                <label for="numero_llantas" class="form-label">
                    Numero LLantas
                </label>
                <select id="clase" class="custom-select" id="numero_llantas" placeholder="" name="numero_llantas" disabled>
                    <option selected></option>
                    <option value="6" {{ $vehiculo->numero_llantas == '6' ? 'selected' : '' }}>6</option>
                    <option value="5" {{ $vehiculo->numero_llantas == '5' ? 'selected' : '' }}>5</option>
                    <option value="2" {{ $vehiculo->numero_llantas == '2' ? 'selected' : '' }}>2</option>
                </select>
            </div>
            <div class="col-2">
                <label for="imensiones_rines" class="form-label">
                    Dimensión de rines
                </label>
                <select id="clase" class="custom-select" id="dimensiones_rines" placeholder="" name="dimensiones_rines" disabled>
                    <option selected></option>
                    <option value="16 pulgadas" {{ $vehiculo->dimensiones_rines == '16 pulgadas' ? 'selected' : '' }}>16 pulgadas</option>
                    <option value="17 pulgadas" {{ $vehiculo->dimensiones_rines == '17 pulgadas' ? 'selected' : '' }}>17 pulgadas</option>
                    <option value="18 pulgadas" {{ $vehiculo->dimensiones_rines == '18 pulgadas' ? 'selected' : '' }}>18 pulgadas</option>
                    <option value="19 pulgadas" {{ $vehiculo->dimensiones_rines == '19 pulgadas' ? 'selected' : '' }}>19 pulgadas</option>
                    <option value="20 pulgadas" {{ $vehiculo->dimensiones_rines == '20 pulgadas' ? 'selected' : '' }}>20 pulgadas</option>
                    <option value="21 pulgadas" {{ $vehiculo->dimensiones_rines == '21 pulgadas' ? 'selected' : '' }}>21 pulgadas</option>
                    <option value="22 pulgadas" {{ $vehiculo->dimensiones_rines == '22 pulgadas' ? 'selected' : '' }}>22 pulgadas</option>
                    <option value="23 pulgadas" {{ $vehiculo->dimensiones_rines == '23 pulgadas' ? 'selected' : '' }}>23 pulgadas</option>
                    <option value="24 pulgadas" {{ $vehiculo->dimensiones_rines == '24 pulgadas' ? 'selected' : '' }}>24 pulgadas</option>

                </select>
            </div>
            <div class="col-2">
                <label for="material_rines" class="form-label">
                    Material de rines
                </label>
                <select id="clase" class="custom-select" id="material_rines" placeholder="" name="material_rines" disabled>
                    <option selected></option>
                    <option value="Aleación de Aluminio" {{ $vehiculo->material_rines == 'Aleación de Aluminio' ? 'selected' : '' }}>Aleación de Aluminio</option>
                    <option value="Acero" {{ $vehiculo->material_rines == 'Acero' ? 'selected' : '' }}>Acero</option>
                    <option value="Magnesio" {{ $vehiculo->material_rines == 'Magnesio' ? 'selected' : '' }}>Magnesio</option>
                    <option value="Fibra de Carbono" {{ $vehiculo->material_rines == 'Fibra de Carbono' ? 'selected' : '' }}>Fibra de Carbono</option>
                    <option value="Híbridos o Compuestos" {{ $vehiculo->material_rines == 'Híbridos o Compuestos' ? 'selected' : '' }}>Híbridos o Compuestos</option>
                    <option value="Plástico Reforzado con Fibra (PRF)" {{ $vehiculo->material_rines == 'Plástico Reforzado con Fibra (PRF)' ? 'selected' : '' }}>Plástico Reforzado con Fibra (PRF)</option>
                    <option value="Acero Inoxidable" {{ $vehiculo->material_rines == 'Acero Inoxidable' ? 'selected' : '' }}>Acero Inoxidable</option>
                    <option value="Titanio" {{ $vehiculo->material_rines == 'Titanio' ? 'selected' : '' }}>Titanio</option>
                    <option value="Rines Forjados" {{ $vehiculo->material_rines == 'Rines Forjados' ? 'selected' : '' }}>Rines Forjados</option>

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
                <select id="clase" class="custom-select" id="tipo_frenos_delanteros" placeholder="" name="tipo_frenos_delanteros" disabled>
                    <option selected></option>
                    <option value="Disco" {{ $vehiculo->tipo_frenos_delanteros == 'Disco' ? 'selected' : '' }}>Disco</option>
                    <option value="Tambor" {{ $vehiculo->tipo_frenos_delanteros == 'Tambor' ? 'selected' : '' }}>Tambor</option>
                    <option value="A.B.S" {{ $vehiculo->tipo_frenos_delanteros == 'A.B.S' ? 'selected' : '' }}>A.B.S</option>
                </select>
            </div>
            <div class="col-4">
                <label for="tipo_frenos_traseros" class="form-label">
                    Tipo de frenos traseros
                </label>
                <select id="clase" class="custom-select" id="tipo_frenos_traseros" placeholder="" name="tipo_frenos_traseros" disabled>
                    <option selected></option>
                    <option value="Disco" {{ $vehiculo->tipo_frenos_delanteros == 'Disco' ? 'selected' : '' }}>Disco</option>
                    <option value="Tambor" {{ $vehiculo->tipo_frenos_delanteros == 'Tambor' ? 'selected' : '' }}>Tambor</option>
                    <option value="A.B.S" {{ $vehiculo->tipo_frenos_delanteros == 'A.B.S' ? 'selected' : '' }}>A.B.S</option>
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
                <input type="text" class="form-control" id="numero_serie" placeholder="" name="numero_serie" value="{{ $vehiculo->numero_serie }}" disabled/>
            </div>
            <div class="col-4">
                <label for="numero_ventanas" class="form-label">
                    Numero de ventanas
                </label>
                <select id="clase" class="custom-select" id="numero_ventanas" placeholder="" name="numero_ventanas" disabled>
                    <option selected></option>
                    <option value="3" {{ $vehiculo->numero_ventanas == '3' ? 'selected' : '' }}>3</option>
                    <option value="4" {{ $vehiculo->numero_ventanas == '4' ? 'selected' : '' }}>4</option>
                    <option value="6" {{ $vehiculo->numero_ventanas == '6' ? 'selected' : '' }}>6</option>
                    <option value="N/A" {{ $vehiculo->numero_ventanas == 'N/A' ? 'selected' : '' }}>N/A</option>
                </select>
            </div>
            <div class="col-4">
                <label for="capacidad_carga" class="form-label">
                    Capacidad de carga | Pasajeros
                </label>
                <select id="clase" class="custom-select" id="capacidad_carga" placeholder="" name="capacidad_carga" disabled>
                    <option selected></option>
                    <option value="2" {{ $vehiculo->capacidad_carga == '2' ? 'selected' : '' }}>2</option>
                    <option value="5" {{ $vehiculo->capacidad_carga == '5' ? 'selected' : '' }}>5</option>
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
                    <h6>Selecione</h6>
    
                    @php
                    $selectedDotacion = explode(',', $vehiculo->dotacion);
                    @endphp
    
    
                    <input type="checkbox" id="examen_a" name="dotacion[]" value="llaves" {{ in_array('llaves', $selectedDotacion) ? 'checked disabled' : '' }} disabled>
                    <label for="examen_a">Llaves</label><br>
    
                    <input type="checkbox" id="examen_b" name="dotacion[]" value="destornilladores" {{ in_array('destornilladores', $selectedDotacion) ? 'checked disabled' : '' }} disabled>
                    <label for="examen_b">Destornilladores</label><br>
    
                    <input type="checkbox" id="examen_c" name="dotacion[]" value="gato" {{ in_array('gato', $selectedDotacion) ? 'checked disabled' : '' }} disabled>
                    <label for="examen_c">Gato</label><br>
    
                    <input type="checkbox" id="examen_d" name="dotacion[]" value="alicates" {{ in_array('alicates', $selectedDotacion) ? 'checked disabled' : '' }} disabled>
                    <label for="examen_d">Alicates</label><br>
    
                    <input type="checkbox" id="examen_e" name="dotacion[]" value="extintor" {{ in_array('extintor', $selectedDotacion) ? 'checked disabled' : '' }} disabled>
                    <label for="examen_e">Extintor</label><br>
    
                    <input type="checkbox" id="examen_f" name="dotacion[]" value="tacos" {{ in_array('tacos', $selectedDotacion) ? 'checked disabled' : '' }} disabled>
                    <label for="examen_f">Tacos</label><br>
    
                    <input type="checkbox" id="examen_g" name="dotacion[]" value="linterna" {{ in_array('linterna', $selectedDotacion) ? 'checked disabled' : '' }} disabled>
                    <label for="examen_g">Linterna</label><br>
    
    
                </div>
            </div> 

            <div class="col-md-4">
                <div class="equipo-container" >
                    <h6>Selecione</h6>
    
                    @php
                    $selectedDotacion = explode(',', $vehiculo->equipo_carretera);
                    @endphp
    
                    <input type="checkbox" name="equipo_carretera[]" value="conos" {{ in_array('conos', $selectedDotacion) ? 'checked disabled' : '' }} disabled>
                    <label for="examen_a">Conos</label><br>
                    <input type="checkbox" name="equipo_carretera[]" value="pendones_viales" {{ in_array('pendones_viales', $selectedDotacion) ? 'checked disabled' : '' }} disabled>
                    <label for="examen_b">Pendones viales</label><br>
                    <input type="checkbox" name="equipo_carretera[]" value="baston_luminoso" {{ in_array('baston_luminoso', $selectedDotacion) ? 'checked disabled' : '' }} disabled>
                    <label for="examen_c">Baston Luminoso</label><br>
                    <input type="checkbox" name="equipo_carretera[]" value="llanta_emergencia" {{ in_array('llanta_emergencia', $selectedDotacion) ? 'checked disabled' : '' }} disabled>
                    <label for="examen_a">Llanta de emergencia</label><br>
                    <input type="checkbox" name="equipo_carretera[]" value="cruceta" {{ in_array('cruceta', $selectedDotacion) ? 'checked disabled' : '' }} disabled>
                    <label for="examen_b">Cruceta</label><br>
                    <input type="checkbox" name="equipo_carretera[]" value="botiquin" {{ in_array('botiquin', $selectedDotacion) ? 'checked disabled' : '' }} disabled>
                    <label for="examen_c">Botiquin</label><br>
                  </div>
            </div> 
            
            
          
        </form> 

        <form id="formulario" class="row g-3" method="POST" action="{{ route('vehiculo.mantenimiento_vehiculo', ['id_vehiculo' => $vehiculo->id_vehiculo]) }}" enctype="multipart/form-data">
            @csrf
        
            <div class="col-12">
                <label for="text" class="form-label">
                    🔹INFORMACIÓN GENERAL:
                </label>
            </div>
        
            <!-- Resto de los campos relacionados a la información del vehículo -->
        
            <div class="col-12">
                <label for="text" class="form-label">
                    <br>
                    7. HISTORIAL DE MANTENIMIENTO:
                </label>
            </div>
            <div class="col-2" style="text-align: center;">
                <label for="fecha_mantenimiento" class="form-label">
                    Fecha mantenimiento
                </label>
                <input type="date" class="form-control" id="fecha_mantenimiento" name="fecha_mantenimiento" required>
            </div>
            <div class="col-2" style="text-align: center;">
                <label for="descripcion" class a="form-label">
                    Descripción
                </label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            </div>
            <div class="col-2" style="text-align: center;">
                <label for="averia_dano" class="form-label">
                    Avería/ Daño
                </label>
                <input type="text" class="form-control" id="averia_dano" name="averia_dano" required>
            </div>
            <div class="col-2" style="text-align: center;">
                <label for="referencia_repuesto" class="form-label">
                    Referencia Repuesto
                </label>
                <input type="text" class="form-control" id="referencia_repuesto" name="referencia_repuesto" required>
            </div>
            <div class="col-2" style="text-align: center;">
                <label for="responsable" class="form-label">
                    Responsable
                </label>
                <input type="text" class="form-control" id="responsable" name="responsable" required>
            </div>
            <div class="col-1" style="text-align: center;">
                <label for="precio" class="form-label">
                    Precio
                </label>
                <input type="text" class="form-control" id="precio" name="precio" required>
            </div> 
        
            <div class="form-group col-md-4">
                <label for="anexos">
                    Cargar archivo
                </label>
                <input type="file" name="anexos" class="form-control" id="anexos">
            </div>
        
            <div class="col-12">
            </div>
            <br>
            <div class="box-footer" style="margin-bottom: 25px;">
                <button type="submit" class="btn btn-dark" id="guardar-btn">Guardar</button> 
            </div>
        </form>
        
    </div>

@stop

@section('js')

@stop