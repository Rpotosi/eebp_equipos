@extends('adminlte::page')

@section('title', 'Modulo Distribución')

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
        /* Estilos para el contenedor principal */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 33vh;
        }

        /* Estilos para las tarjetas */
        .card {
            color: rgb(0, 0, 0);
            aspect-ratio: 1/1;
            height: 280px;
            justify-content: center;
            align-items: center;
            background-color: rgb(255, 255, 255);
            margin: 60px;
            box-shadow: 16px 14px 20px #0000008c;
            border-radius: 100%;
            zoom: 80%;
        }

        .card:hover{
            background-color:   #d7d9df;
            color: rgb(255, 255, 255);
        }

        #icon_crear_orden{
            font-size: 400%; /* Tamaño del icono */
            color: rgb(87, 156, 41); /* Color del icono */
        }


    </style>

    <h1 style="text-align: center" font family="inherit">SGE</h1>
@stop

@section('content')
<div class="container">
    <a href="{{route('distribucion.create_equipo_interruptor')}}">
        <div class="card" style="text-align: center;">
            <i id="icon_crear_orden" class="fas fa-toggle-on"></i> <!-- Interruptor -->
            <br>
            <h5><b>Interruptores</b></h5>
        </div>
    </a>

    <a href="{{route('distribucion.create_equipo_seccionador')}}">
        <div class="card" style="text-align: center;">
            <i id="icon_crear_orden" class="fas fa-exchange-alt"></i> <!-- Seccionador -->
            <br>
            <h5><b>Seccionadores</b></h5>
        </div>
    </a>

    <a href="{{route('distribucion.create_equipo_interruptor')}}">
        <div class="card" style="text-align: center;">
            <i id="icon_crear_orden" class="fas fa-bolt"></i> <!-- Pararrayos -->
            <br>
            <h5><b>Pararrayos</b></h5>
        </div>
    </a>
</div>

<div class="container">
    <a href="{{route('distribucion.create_equipo_interruptor')}}">
        <div class="card" style="text-align: center;">
            <i id="icon_crear_orden" class="fas fa-plug"></i> <!-- Trafo CT -->
            <br>
            <h5><b>Trafo CT</b></h5>
        </div>
    </a>
    <a href="{{route('distribucion.create_equipo_interruptor')}}">
        <div class="card" style="text-align: center;">
            <i id="icon_crear_orden" class="fas fa-plug"></i> <!-- Trafo PT -->
            <br>
            <h5><b>Trafo PT</b></h5>
        </div>
    </a>
    <a href="{{route('distribucion.create_equipo_interruptor')}}">
        <div class="card" style="text-align: center;">
            <i id="icon_crear_orden" class="fas fa-plug"></i> <!-- Trafo Potencia -->
            <br>
            <h5><b>Trafo Potencia</b></h5>
        </div>
    </a>
    
</div>


        
            



    
@stop

@section('js')
    <!--código js si es requerido-->
@stop
