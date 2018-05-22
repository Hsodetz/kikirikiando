@extends('adminlte::page')

@section('title', "Evento | $event->name ")

@section('content')

<div class="container">

  <div class="row">
    <div class="col-sm-6 col-sm-offset-2">
      <div class="panel panel-info">
        <!-- Default panel contents -->
        <div class="panel-heading"> Ver Evento </div>

        <div class="panel-body">
          <p class="text-center">
            <img src="../evento/imagenes/{{ $event->image }}" alt="" width="300px" height="200px"
            class="img-rounded" style="border: 2px solid gray; box-shadow: 3px 3px 0px gray;">
          </p>
          <h4> {{ $event->title }} </h4>

        </div>
        <!-- List group -->
        <ul class="list-group">
          <li class="list-group-item">  </li>
          <li class="list-group-item"> </li>
          <li class="list-group-item"> </li>
          <li class="list-group-item"> <a href="{{ URL::previous() }}"> <i class="fa fa-arrow-left"></i> Regresar </li> </a>
        </ul>
      </div>
    </div>
  </div>

  </div>



</div>

@stop
