
@extends('adminlte::page')

@section('title', 'Padre | Edicion')

@section('content')

<div class="col-sm-8 col-sm-offset-2">
  
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Editar Padre</h3>

    </div>
    <div class="box-body">
      
      {!! Form::model($father, ['route' => ['padres.update', $father->id], 'method' => 'PUT']) !!}
        {{ csrf_field() }}
        
        @include('admin.fathers.partials.form')
        
      {!! Form::close() !!}

    </div><!-- /.box-body -->
  </div>

</div>

@stop

