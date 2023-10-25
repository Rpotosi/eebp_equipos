@extends('adminlte::page')

@section('title', 'equipos')

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
            margin-top: 7px;
        }
        
        #formulario{
            padding: 2%;         
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
    <h1 style="text-align: center">New Equipo</h1>
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
        <form id="formulario" action="{{route('equipo.create_equipo')}}" method="POST" enctype="multipart/form-data" class="row g-3">
            <!-- esta linea requiere ruta Route::post definida en routes Route EquiposController-->
            
            @csrf

            <div class="col-12">
                <label for="text" class="form-label"> <br>
                    1. DATOS GENERALES:
                </label>
            </div>

            <div class="col-md-2">
                <label for="proceso" class="form-label">
                    proceso
                </label>
                <input type="text" class="form-control" id="proceso" name="proceso" required/>
            </div>

            <div class="col-md-2">
                <label for="reponsabel_equipo" class="form-label">
                    Responsable del equipo
                </label>
                <input type="text" class="form-control" id="reponsabel_equipo" name="reponsabel_equipo" required/>
            </div>

            <div class="col-12">
                <label for="text" class="form-label"> <br>
                    2. ESPECIFICACIONES:
                </label>
            </div>

            <div class="col-md-2">
                <label for="nombre_equipo" class="form-label">
                    Nombre del equipo
                </label>
                <input type="text" class="form-control" id="nombre_equipo" name="nombre_equipo" required>
            
            </div>

            <div class="col-md-2">
                <label for="marca" class="form-label">
                    Marca
                </label>
                <input type="text" class="form-control" id="marca" placeholder="" name="marca" required/>
            </div>

            <div class="col-2">
                <label for="serie" class="form-label">
                    Serie
                </label>
                <input type="text" class="form-control" id="serie" placeholder="" name="serie" required/>
            </div>
            <div class="col-2">
                <label for="modelo" class="form-label">
                    Modelo
                </label>
                <input type="text" class="form-control" id="modelo" placeholder="" name="modelo" required/>
            </div>
            <div class="col-2">
                <label for="fecha_funcionamiento" class="form-label">
                    Fecha | FuncionamientoS
                </label>
                <input type="text" class="form-control" id="fecha_funcionamiento" placeholder="" name="fecha_funcionamiento" required/>
            </div>
            <div class="col-2">
                <label for="id_Inventario" class="form-label">
                    Id Inventario
                </label>
                <input type="text" class="form-control" id="id_Inventario" placeholder="" name="id_Inventario" required/>
            </div>

            <div class="col-12">
                <label for="text" class="form-label"> <br>
                    3. DATOS DEL PROVEEDOR:
                </label>
            </div>
            <div class="col-2">
                <label for="fabricante" class="form-label">
                    Fabricante
                </label>
                <input type="text" class="form-control" id="fabricante" placeholder="" name="fabricante" required/>
            </div>

            
            <div class="col-2" style="text-align: left;">
                <label for="fecha_adquicion" class="form-label">
                    Fecha aquisicion
                </label>
                <input type="date" class="form-control" id="fecha_adquicion" placeholder="" name="fecha_adquicion" required/>
                
            </div>
            <div class="col-2" style="text-align: left;">
                <label for="nombre_proveedor" class="form-label">
                    Nombre Proveedor
                </label>
                <input type="text" class="form-control" id="nombre_proveedor" placeholder="" name="nombre_proveedor" required/>
                
            </div>
            <div class="col-2"style="text-align: left;">
                <label for="direccion_proveedor" class="form-label">
                    Direccion Proveedor
                </label>
                <input type="text" class="form-control" id="direccion_proveedor" placeholder="" name="direccion_proveedor" required/>
               >
            </div>
            <div class="col-2"style="text-align: left;">
                <label for="datos_contacto" class="form-label">
                    Datos Conctacto
                </label>
                <input type="text" class="form-control" id="datos_contacto" placeholder="" name="datos_contacto" required/>
              
            </div>

            <div class="col-md-2">
                <label for="garantias" class="form-label">
                    Manual de Operacion
                </label>
                <select id="clase" class="custom-select" id="garantias" placeholder="" name="garantias" required>
                    <option selected></option>
                    <option>sí</option>
                    <option>No</option>
                </select>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="mantenimiento_recomendado" class="form-label">
                    Mantenimiento|Recomendado
                </label>
                <input type="text" class="form-control" id="mantenimiento_recomendado" placeholder="" name="mantenimiento_recomendado" required/>
              
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="codiciones_operacion" class="form-label">
                    Codiciones de Operacion
                </label>
                <input type="text" class="form-control" id="codiciones_operacion" placeholder="" name="codiciones_operacion" required/>
              
            </div>

            <div class="col-12">
                <label for="text" class="form-label"> <br>
                    4. CARACTERISTICAS METROLOGICAS DEL EQUIPO
                </label>
            </div>


            <div class="col-2" style="text-align: left;">
                <label for="unidad_medida" class="form-label">
                    Unidades de Medida
                </label>
                <input type="text" class="form-control" id="unidad_medida" placeholder="" name="unidad_medida" required/>
              
            </div>
            <div class="col-2" style="text-align: left;">
                <label for="rango_medicion" class="form-label">
                    Rango de Operación
                </label>
                <input type="text" class="form-control" id="rango_medicion" placeholder="" name="rango_medicion" required/>
              
            </div>
            <div class="col-2" style="text-align: left;"> 
                <label for="precision" class="form-label">
                    Precisión
                </label>
                <input type="text" class="form-control" id="precision" placeholder="" name="precision" required/>
              
            </div>
            <div class="col-2" style="text-align: left;">
                <label for="rexactitud" class="form-label">
                    Exactitud
                </label>
                <input type="text" class="form-control" id="exactitud" placeholder="" name="exactitud" required/>
              
            </div>
            <div class="col-2" style="text-align: left;">
                <label for="frecuencia_calibracion" class="form-label">
                    Frecuencia de Calibracion
                </label>
                <input type="text" class="form-control" id="frecuencia_calibracion" placeholder="" name="frecuencia_calibracion" required/>
              
            </div>
            <div class="col-2" style="text-align: left;">
                <label for="frecuencia_validacion" class="form-label">
                    Frecuencia de Verificación
                </label>
                <input type="text" class="form-control" id="frecuencia_validacion" placeholder="" name="frecuencia_validacion" required/>
              
            </div>
           
            <div class="col-2" style="text-align: left;">
                <label for="vida_util" class="form-label">
                    Vida Util
                </label>
                <input type="text" class="form-control" id="vida_util" placeholder="" name="vida_util" required/>
              
            </div>

            <div class="col-md-1">
                <label for="garantias" class="form-label">
                    Garantias
                </label>
                <select id="clase" class="custom-select" id="garantias" placeholder="" name="garantias" required>
                    <option selected></option>
                    <option>sí</option>
                    <option>No</option>
                </select>
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="duracion" class="form-label">
                    Duración
                </label>
                <input type="text" class="form-control" id="duracion" placeholder="" name="duracion" required/>
              
            </div>

            <div class="col-12">
                <label for="text" class="form-label"><br>
                    5. REGISTRO DE MANTENIMIENTO
                </label>
            </div>
            
            <div class="col-md-2">
                <label for="fecha" class="form-label">
                 Fecha
                </label>
                <input type="date" class="form-control" id="fecha" name="fecha" min="{{ \Carbon\Carbon::now()->toDateString() }}" required/> 
            </div>

            <div class="col-2" style="text-align: left;">
                <label for="descripcion" class="form-label">
                    Descripción
                </label>
                <input type="text" class="form-control" id="descripcion" placeholder="" name="descripcion" required/>
              
            </div>
            
            <div class="col-md-2">
                <label for="tipo_direccion" class="form-label">
                    Tipo Procedimiento
                </label>
                <select id="clase" class="custom-select" id="tipo_direccion" placeholder="" name="tipo_direccion" required>
                    <option selected></option>
                    <option>MP</option>
                    <option>MC</option>
                    <option>C</option>
                    <option>V</option>
                </select>
            </div>
         
            <div class="col-2" style="text-align: left;">
                <label for="responsable" class="form-label">
                    RESPONSABLE
                </label>
                <input type="text" class="form-control" id="responsable" placeholder="" name="responsable" required/>
              
            </div>
            <div class="col-2" style="text-align: left;">
                <label for="laboratorio" class="form-label">
                    LABORATORIO
                </label>
                <input type="text" class="form-control" id="laboratorio" placeholder="" name="laboratorio" required/>
            </div> 
            <div class="col-2" style="text-align: left;">
                <label for="numero_certificado" class="form-label">
                    # CERTIFICADO
                </label>
                <input type="text" class="form-control" id="numero_certificado" placeholder="" name="numero_certificado" required/>
            </div> 


            
            <div class="box-footer" style="margin-bottom: 25px;">
                <br>

                <button type="submit" class="btn btn-primary" id="guardar-btn">Guardar</button> 
            </div>
        </form>

@stop

@section('js')

@stop