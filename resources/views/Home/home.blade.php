@extends('adminlte::page')


@section('title', 'Dashboard')


@section('content_header')

        <div style="text-align: end;">
            <div style="background-color: #08b94e; display: inline-block; padding: 5px;">
                <p style="margin: 0;"><b>Bienvenido: </b>{{ $user->username }}</p>
            </div>
        </div> 
    <h1>SGE</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
 
@stop