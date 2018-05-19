
@extends('adminlte::page')

@section('title', "Padre | Nuevo")

@section('content')

<div class="col-sm-8 col-sm-offset-2">
  
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Crear Padre</h3>

    </div>
    <div class="box-body">
      
      {!! Form::open(['route' => 'padres.store', 'method' => 'POST']) !!}
        {{ csrf_field() }}
        
        @include('admin.fathers.partials.form')
        
      {!! Form::close() !!}

    </div><!-- /.box-body -->
  </div>

</div>

@stop

