@extends('adminlte::page')

@section('title', "Materia | $matter->name ")

@section('content')

<div class="container">

  <div class="row">
    <div class="col-sm-6 col-sm-offset-2">
      <div class="panel panel-info">
        <!-- Default panel contents -->
        <div class="panel-heading"> Ver Materia </div>
        
      
        <!-- List group -->
        <ul class="list-group">
          <li class="list-group-item"> <strong> Nombre: </strong> {{ $matter->name }} </li>
          <li class="list-group-item"> <strong> Horario: </strong> {{ $matter->schedule }} </li>
          <li class="list-group-item"> <strong> Profesor de la materia: </strong> {{ $matter->teacher->name }} </li>
          <li class="list-group-item"> <strong> Colegio de dicta la materia: </strong> {{ $matter->school->name }} </li>
          <li class="list-group-item"> <a href="{{ URL::previous() }}"> <i class="fa fa-arrow-left"></i> Regresar </li> </a>
        </ul>
      </div>
    </div>
  </div>

</div>
  
@stop
