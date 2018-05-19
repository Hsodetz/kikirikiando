
@extends('adminlte::page')

@section('title', "Asistencia | Nuevo")

@section('content')

<div class="col-sm-8 col-sm-offset-2">
  
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Crear Asistencia</h3>

    </div>
    <div class="box-body">
      
      {!! Form::open(['route' => 'asistencias.store', 'method' => 'POST']) !!}
        {{ csrf_field() }}
        
        @include('admin.assistances.partials.form')
        
      {!! Form::close() !!}

    </div><!-- /.box-body -->
  </div>

</div>

@stop

