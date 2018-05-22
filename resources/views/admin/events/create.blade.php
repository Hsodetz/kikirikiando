
@extends('adminlte::page')

@section('title', "Evento | Nuevo")

@section('content')

<div class="col-sm-8 col-sm-offset-2">

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Crear Evento</h3>

    </div>
    <div class="box-body">

      {!! Form::open(['route' => 'eventos.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{ csrf_field() }}

        @include('admin.events.partials.form')

      {!! Form::close() !!}

    </div><!-- /.box-body -->
  </div>

</div>

@stop
