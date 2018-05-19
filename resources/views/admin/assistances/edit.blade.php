
@extends('adminlte::page')

@section('title', 'Estudiante | Edicion')

@section('content')

<div class="col-sm-8 col-sm-offset-2">
  
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Editar Estudiante</h3>

    </div>
    <div class="box-body">
      
      {!! Form::model($student, ['route' => ['estudiantes.update', $student->id], 'method' => 'PUT']) !!}
        {{ csrf_field() }}
        
        @include('admin.students.partials.form')
        
      {!! Form::close() !!}

    </div><!-- /.box-body -->
  </div>

</div>

@stop

