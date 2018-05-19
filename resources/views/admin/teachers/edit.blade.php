
@extends('adminlte::page')

@section('title', 'Profesor | Edicion')

@section('content')

<div class="col-sm-8 col-sm-offset-2">
  
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Editar Prpfesor</h3>

    </div>
    <div class="box-body">
      
      {!! Form::model($teacher, ['route' => ['profesores.update', $teacher->id], 'method' => 'PUT']) !!}
        {{ csrf_field() }}
        
        @include('admin.teachers.partials.form')
        
      {!! Form::close() !!}

    </div><!-- /.box-body -->
  </div>

</div>

@stop

