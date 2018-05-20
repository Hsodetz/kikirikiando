@extends('adminlte::page')

@section('title', 'Waynakay | Dashboard')

@section('content_header')
    <div class="container">
        <h1 class="text-warning text-center"> Aqui empezamos </h1>
        <passport-clients></passport-clients>
		<passport-authorized-clients></passport-authorized-clients>
		<passport-personal-access-tokens></passport-personal-access-tokens>
    </div>
@stop

@section('content')
    <div class="container">
        <p> Te has logueado satisfactoriamente </p>    
    </div>    
    
@stop

