
@extends('adminlte::page')

@section('title', "Colegio | Nuevo")

@section('content')

<div class="col-sm-8 col-sm-offset-2">
  
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Crear Colegio</h3>

    </div>
    <div class="box-body">
      
      {!! Form::open(['route' => 'colegios.store', 'method' => 'POST']) !!}
        {{ csrf_field() }}
        
        @include('admin.schools.partials.form')
        
      {!! Form::close() !!}

    </div><!-- /.box-body -->
  </div>

</div>

@stop

