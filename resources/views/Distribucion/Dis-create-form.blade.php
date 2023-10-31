@extends('adminlte::page')

@section('title', 'home')

@section('content_header')
    
    <style>
        /* Estilos para el contenedor principal */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60vh;
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

    <div class="container-fluid">  <div style="text-align: end;">
        <div style="background-color: #e8edf8; display: inline-block; padding: 5px;">
            <p style="margin: 0;"><b>Bienvenido: </b></p>
        </div>
    </div>

    <h1 style="text-align: center" font family="inherit">SGE</h1>
@stop

@section('content')
    <div class="container">
       
        
        
        <a href="{{route('distribucion_equipo.create_equipo')}}" > <!-- Route define and wep.php--->
            <div class="card" style="text-align: center;">
                <i id="icon_crear_orden" class="fas fa-cogs"></i>
                <br>
                <h5>
                    <b>
                        Equipos
                    </b>
                </h5>
            </div>
        </a>

        
    </div>
@stop

@section('js')
    <!--código js si es requerido-->
@stop