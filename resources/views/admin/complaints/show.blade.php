@extends('adminlte::page')

@section('title', "Padre | $school->name ")

@section('content')

<div class="container">

  <div class="row">
    <div class="col-sm-6 col-sm-offset-2">
      <div class="panel panel-info">
        <!-- Default panel contents -->
        <div class="panel-heading"> Ver Colegio </div>
        
      
        <!-- List group -->
        <ul class="list-group">
          <li class="list-group-item"> <strong> Nombre Colegio: </strong> {{ $school->name }} </li>
          <li class="list-group-item"> <strong> Ciudad: </strong> {{ $school->city }} </li>
          <li class="list-group-item"> <strong> Direccion: </strong> {{ $school->address }} </li>
          
          <li class="list-group-item"> <a href="{{ URL::previous() }}"> <i class="fa fa-arrow-left"></i> Regresar </li> </a>
        </ul>
      </div>
    </div>
  </div>

</div>
  
@stop
