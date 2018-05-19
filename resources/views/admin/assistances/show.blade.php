@extends('adminlte::page')

@section('title', "Estudiante | $student->name ")

@section('content')

<div class="container">

  <div class="row">
    <div class="col-sm-6 col-sm-offset-2">
      <div class="panel panel-info">
        <!-- Default panel contents -->
        <div class="panel-heading"> Ver Estudiante </div>
        
      
        <!-- List group -->
        <ul class="list-group">
          <li class="list-group-item"> <strong> Nombre: </strong> {{ $student->name }} </li>
          <li class="list-group-item"> <strong> Apellido: </strong> {{ $student->lastname }} </li>
          <li class="list-group-item"> <strong> Padre o Representante: </strong> {{ $student->father->name }} {{ $student->father->lastname }}</li>
          <li class="list-group-item"> <strong> Colegio al que asiste: </strong> {{ $student->school->name }} </li>
          <li class="list-group-item"> <a href="{{ URL::previous() }}"> <i class="fa fa-arrow-left"></i> Regresar </li> </a>
        </ul>
      </div>
    </div>
  </div>

</div>
  
@stop
