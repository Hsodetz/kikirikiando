@extends('adminlte::page')

@section('title', "Denuncia | $complaint->name ")

@section('content')

<div class="container">

  <div class="row">
    <div class="col-sm-6 col-sm-offset-2">
      <div class="panel panel-info">
        <!-- Default panel contents -->
        <div class="panel-heading"> Ver Denuncia
          @if ($complaint->gravity == "HIGH")
            <span class="pull-right label label-danger">
              Alta
            </span>
          @elseif ($complaint->gravity == 'MEDIUM')
            <span class="pull-right label label-warning">
              Media
            </span>
          @elseif ($complaint->gravity == 'LOW')
            <span class="pull-right label label-info">
              Baja
            </span>
          @endif
        </div>

        <div class="panel-body">
          <p class="text-center">
            <img src="../denuncia/imagenes/{{ $complaint->image }}" alt="" width="300px" height="200px"
            class="img-rounded" style="border: 2px solid gray; box-shadow: 3px 3px 0px gray;">
          </p>
          <h4> {{ $complaint->affair }} </h4>

        </div>
        <!-- List group -->
        <ul class="list-group">
          <li class="list-group-item"> {{ $complaint->text }} </li>
          <li class="list-group-item"> <strong>Padre: </strong> {{ $complaint->father->name }} {{ $complaint->father->lastname }} </li>
          <li class="list-group-item"> <strong>Alumno: </strong>{{ $complaint->student->name }} {{ $complaint->student->lastname }} </li>
          <li class="list-group-item"> <a href="{{ URL::previous() }}"> <i class="fa fa-arrow-left"></i> Regresar </li> </a>
        </ul>
      </div>
    </div>
  </div>

  </div>



</div>

@stop
