@extends('adminlte::page')

@section('title', 'vehiculo')

@section('content_header')


    <style>
        .btn {
            background-color: rgb(87, 156, 41);
            box-shadow: none;
            border-color: rgb(87, 156, 41);

        }

        .td-button{

            justify-content: center;

        }
    </style>
  
    <div style="text-align: end;">
        <div style="background-color:#f6c21e; display: inline-block; padding: 5px;">
            <p style="margin: 0;"><b>Bienvenido: 
        </div>
    </div>


    <h1 class="aling-center" style="text-align:center"> Gestión de Vehiculos8888</h1>    

@stop

@section('content')
<form class="buscar">
    <div class="form-group">
        <label for="placa" class="titulo">Búsqueda de Placa:</label>
        <div class="input-group">
            <input type="search" name="placa" id="placa" class="form-control" style="max-width: 300px;" placeholder="no_placa" value="">
            <!-- Espacio entre "Buscar orden" y "Filtrar todo" -->
            <div style="width: 10px;"></div>
            <select name="estado" class="form-control" style="max-width: 150px;">
          
            </select>
    
            <!-- Espacio entre "Filtrar todo" y "Fecha inicio" -->
            <div style="width: 10px;"></div>
            <!-- Campo de fecha de inicio -->
            <input type="date" name="fecha_inicio" class="form-control" style="max-width: 200px;" value="{{ $fechaInicio ?? '' }}">
            <!-- Espacio entre "Fecha inicio" y "Fecha fin" -->
            <div style="width: 10px;"></div>
            <!-- Campo de fecha de fin -->
            <input type="date" name="fecha_fin" class="form-control" style="max-width: 200px;" value="{{ $fechaFin ?? '' }}">
            <div class="input-group-append">
                <input type="submit" value="Buscar" class="btn btn-dark" id="buscar-btn" onclick="limpiarPlaceholder()">
            </div>
        </div>
    </div>
</form>




    <div class="table-responsive" id="tabla">
        <table class="table table-hover table-condensed table-bordered mt-5">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>placa_vehiculo</th>
                    <th>marca</th>
                    <th>motor</th>
                    <th>Chasis</th>
                    <th>modelo</th>
                    <th>color</th>
                    <th>cilindraje</th>
                    <th>fecha_soat</th>
                    <th>tecnomecanica</th>
                    <th>Agregar mantenimiento</th>
                    <th>Ver Hoja de Vida</th>
                  
                </tr>
            </thead>
            <tbody>

                @foreach ( $vehiculos as $vehiculo )

                    <tr>

                        <td>
                            {{$vehiculo->id_vehiculo}}
                        </td>
                        <td>
                            {{$vehiculo->placa}}
                        </td>
                
                        <td>
                            {{$vehiculo->marca}}
                        </td>

                        <td>
                            {{$vehiculo->motor}}
                        </td>
                
                        <td>
                            {{$vehiculo->chasis}}
                        </td>
                        <td>
                            {{$vehiculo->modelo}}
                        </td>
                
                        <td>
                            {{$vehiculo->color}}
                        </td>

                        <td>
                            {{$vehiculo->cilindraje}}
                        </td>     
                        <td>
                            {{$vehiculo->fecha}}
                        </td> 
                        <td>
                            {{$vehiculo->fecha_tecnomecanica}}
                        </td> 
                    

                        <td>
                            <a href="{{ route('vehiculo.edit_vehiculo', $vehiculo)}}">
                                <button class="btn btn-warning" onclick="Editar"><i class="fas fa-edit"></i></button>
                            </a>    
                        </td>

                        <td>
                            <a href="{{ url('/update-vehiculo')}}">
                                <button class="btn btn-warning" onclick="Editar"><i class="fas fa-edit"></i></button>
                            </a>    
                        </td>

                                    
                    </tr>                    
                @endforeach
            </tbody>
        </table>
        <!-- Paginación con enlaces y variables de búsqueda incluidas -->
       

    </div>    
@stop

@section('js')
   
@stop