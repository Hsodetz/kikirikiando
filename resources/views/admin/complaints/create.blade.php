
@extends('adminlte::page')

@section('title', "Denuncia | Nuevo")

@section('content')

<div class="col-sm-8 col-sm-offset-2">

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Crear Denuncia</h3>

    </div>
    <div class="box-body">

      {!! Form::open(['route' => 'denuncias.store', 'method' => 'POST']) !!}
        {{ csrf_field() }}

        @include('admin.complaints.partials.form')

      {!! Form::close() !!}

    </div><!-- /.box-body -->
  </div>

</div>

@stop
