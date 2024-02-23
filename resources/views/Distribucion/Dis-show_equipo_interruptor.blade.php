@extends('adminlte::page')

@section('title', 'Consultar Equipos Dis')

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
         .btn {
            background-color: rgb(11, 109, 187);
            box-shadow: none;
            border-color: rgb(11, 109, 187);

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

  <div style="text-align: center;">
    <div style="background-color: white; display: inline-block; padding: 12px;">
        <p style="margin: 0;"> 🔹Gestión De Equipos 🔹</p>
    </div>
</div>

@stop

@section('content')
<form class="buscar">
    <div class="form-group">
        <label for="nombre_equipo" class="titulo">Búsqueda de nombre_equipo:</label>
        <div class="input-group">
            <input type="search" name="nombre_equipo" id="nombre_equipo" class="form-control" style="max-width: 300px;" placeholder="no_nombre_equipo" value="">
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
                    <th>Nombre Equipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>No_activo</th>
                    <th>Codigo</th>
                    <th>Lugar|Proceso</th>
                    <th>Fecha|Entrega</th>
                    <th>Nombre_Responsable</th>
                    <th>Cargo</th>
                    <th>Mantenimiento ➕</th>
                    <th>Hoja de Vida</th>

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
                            <a href="{{ route('distribucion.create_mantenimiento_equipo', $equipo) }}">
                                <button class="btn btn-success" onclick="Editar"><i class="fas fa-edit"></i></button>
                            </a>
                        </td>

                        <td class="text-center">
                            <a href="{{ route('distribucion.show_equipo_CV', $equipo) }}">
                                <button class="btn btn-success" onclick="Editar"><i class="fas fa-file"></i></button>
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
