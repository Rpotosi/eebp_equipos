@extends('adminlte::page')

@section('title', 'Crear Equipos')

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
            <p style="margin: 0;"> 🔹Cronograma🔹</p>
        </div>
    </div>
@stop

@section('content')

            <p style="text-align: center;">Aquí diseñar el Cronograma de mantenimiento que permita calcular la ejecución por cada mantenimiento según cronograma</p>

@stop

@section('js')

@stop
