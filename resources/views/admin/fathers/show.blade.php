@extends('adminlte::page')

@section('title', "Padre | $father->name ")

@section('content')

<div class="container">

  <div class="row">
    <div class="col-sm-6 col-sm-offset-2">
      <div class="panel panel-info">
        <!-- Default panel contents -->
        <div class="panel-heading"> Ver Padre </div>
        
      
        <!-- List group -->
        <ul class="list-group">
          <li class="list-group-item"> <strong> Nombre: </strong> {{ $father->name }} </li>
          <li class="list-group-item"> <strong> Apellido: </strong> {{ $father->lastname }} </li>
          <li class="list-group-item"> <strong> Email: </strong> {{ $father->email }} </li>
          <li class="list-group-item"> <strong> Ciudad: </strong> {{ $father->city }} </li>
          <li class="list-group-item"> <strong> Telefono: </strong> {{ $father->phone }} </li>
          <li class="list-group-item"> <a href="{{ URL::previous() }}"> <i class="fa fa-arrow-left"></i> Regresar </li> </a>
        </ul>
      </div>
    </div>
  </div>

</div>
  
@stop
