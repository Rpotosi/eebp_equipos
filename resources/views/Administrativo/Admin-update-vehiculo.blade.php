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
        <form id="formulario" action="{{ route('vehiculo.create_vehiculo') }}" method="POST" enctype="multipart/form-data" class="row g-3">
            <!-- esta linea requiere ruta Route::post('guias/create', 'store')->name(('guias.create'));  definida el routes guia-->
            
            @csrf
            @method("PATCH")


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
                <label for="dimension_rines" class="form-label">
                    Dinemensión de rines
                </label>
                <select id="clase" class="custom-select" id="dimension_rines" placeholder="" name="dimension_rines" required>
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
            
            <!--
            <div class="col-12">
                <label for="text" class="form-label">
                    <br>
                    7.HISTORAIL DE MANTENIMIENTO:
                </label>
            </div>
            <div class="col-2" style="text-align: center;">
                <label for="fecha_mantenimiento" class="form-label">
                    Fecha mantenimiento
                </label>
                <input type="date" class="form-control" id="fecha_mantenimiento" placeholder="" name="fecha_mantenimiento" required/>
                
            </div>
            <div class="col-2" style="text-align: center;">
                <label for="descripcion" class="form-label">
                    Descripcion
                </label>
                <input type="text" class="form-control" id="descripcion" placeholder="" name="descripcion" required/>
                
            </div>
            <div class="col-2"style="text-align: center;">
                <label for="averia_dano" class="form-label">
                    Averia/ Daño
                </label>
                <input type="text" class="form-control" id="averia_dano" placeholder="" name="averia_dano" required/>
               
            </div>
            <div class="col-2"style="text-align: center;">
                <label for="referencia_repuesto" class="form-label">
                    Referencia Respuesto
                </label>
                <input type="text" class="form-control" id="referencia_repuesto" placeholder="" name="referencia_repuesto" required/>
              
            </div>
            <div class="col-2" style="text-align: center;">
                <label for="responsable" class="form-label">
                    Responsable
                </label>
                <input type="text" class="form-control" id="responsable" placeholder="" name="responsable" required/>
               
            </div>
            <div class="col-2" style="text-align: center;">
                <label for="precio" class="form-label">
                    Precio
                </label>
                <input type="text" class="form-control" id="precio" placeholder="" name="precio" required/>
              
            </div>
            --->
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