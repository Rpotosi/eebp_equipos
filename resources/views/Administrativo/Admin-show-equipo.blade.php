@extends('adminlte::page')

@section('title', 'equipo')

@section('content_header')


<div style="text-align: end;">
    <div style="background-color: #08b94e; display: inline-block; padding: 5px;">
        <p style="margin: 0;"><b>Bienvenido: </b>{{ $user->username }}</p>
    </div>
</div>

    <style>
        .btn {
            background-color: rgb(87, 156, 41);
            box-shadow: none;
            border-color: rgb(87, 156, 41);

        }

        .td-button{

            justify-content: center;

        }

        .form-group {
            zoom: 80%;
        }
        .table-responsive{
            zoom: 80%;
        }
    </style>

    <h1 class="aling-center" style="text-align:center"> Gestión de Equipos</h1>    

@stop

@section('content')
<form class="buscar">
    <div class="form-group">
        <label for="nombre_equipo" class="titulo">Búsqueda de Placa:</label>
        <div class="input-group">
            <input type="search" name="nombre_equipo" id="nombre_equipo" class="form-control" style="max-width: 300px;" placeholder="nombre_equipo" value="">
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
                    <th>Id_equipo</th>
                    <th>nombre_equipo</th>
                    <th>marca</th>
                    <th>modelo</th>
                    <th>no_activo</th>
                    <th>codigo</th>
                    <th>lugar_proceso</th>
                    <th>fecha_entrega</th>
                    <th>nombre_responsable</th>
                    <th>cargo</th>
                    <th>Agregar mantenimiento</th>
                    <th>Ver Hoja de Vida</th>
                  
                </tr>
            </thead>
            <tbody>

                @foreach ( $equipos as $equipo )

                    <tr>

                        <td>
                            {{$equipo->id_equipo}}
                        </td>
                        <td>
                            {{$equipo->nombre_equipo}}
                        </td>
                
                        <td>
                            {{$equipo->marca}}
                        </td>

                        <td>
                            {{$equipo->modelo}}
                        </td>
                
                        <td>
                            {{$equipo->no_activo}}
                        </td>
                        <td>
                            {{$equipo->codigo}}
                        </td>
                
                        <td>
                            {{$equipo->lugar_proceso}}
                        </td>

                        <td>
                            {{$equipo->fecha_entrega}}
                        </td>     
                        <td>
                            {{$equipo->nombre_responsable}}
                        </td> 
                        <td>
                            {{$equipo->cargo}}
                        </td> 
                    

                        <td class="text-center">
                            <a href="{{ route('administrativo.create_mantenimiento_equipo', $equipo) }}">
                                <button class="btn btn-warning" onclick="Editar"><i class="fas fa-edit"></i></button>
                            </a>    
                        </td>

                        <td class="text-center">
                            <a href="{{ route('administrativo.show_equipo_CV', $equipo) }}">
                                <button class="btn btn-warning" onclick="Editar"><i class="fas fa-edit"></i></button>
                            </a>    
                        </td>

                                    
                    </tr>                    
                @endforeach
            </tbody>
        </table>
             <!-- Paginación con enlaces y variables de búsqueda incluidas -->
             {{$equipos->appends(['nombre_equipo' => $buscarpor])->links()}}
       

    </div>    
@stop

@section('js')
   
@stop