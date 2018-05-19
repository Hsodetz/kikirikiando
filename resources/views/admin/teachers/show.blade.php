@extends('adminlte::page')

@section('title', "Padre | $teacher->name ")

@section('content')

<div class="container">

  <div class="row">
    <div class="col-sm-6 col-sm-offset-2">
      <div class="panel panel-info">
        <!-- Default panel contents -->
        <div class="panel-heading"> Ver Profesor </div>
        
      
        <!-- List group -->
        <ul class="list-group">
          <li class="list-group-item"> <strong> Nombre: </strong> {{ $teacher->name }} </li>
          <li class="list-group-item"> <strong> Apellido: </strong> {{ $teacher->lastname }} </li>
          <li class="list-group-item"> <strong> Email: </strong> {{ $teacher->email }} </li>
          <li class="list-group-item"> <strong> Telefono: </strong> {{ $teacher->phone }} </li>
          <li class="list-group-item"> <strong> Escuela a la que pertenece: </strong> {{ $teacher->school->name }} </li>
          <li class="list-group-item"> <a href="{{ URL::previous() }}"> <i class="fa fa-arrow-left"></i> Regresar </li> </a>
        </ul>
      </div>
    </div>
  </div>

</div>
  
@stop
