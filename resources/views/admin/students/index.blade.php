@extends('adminlte::page')

@section('title', 'Estudiantes | all')

@section('content')

@include('sweetalert::alert')

<div class="panel panel-info">
  <div class="panel-heading">
    Listado de Estudiantes
    <a href="{{ route('estudiantes.create') }}" class="btn btn-xs btn-primary pull-right"> Crear </a>
  </div>
  <div class="panel-body">
    <table class="table responsive striped">
      <thead>
        <tr>
          <th>Nombres</th>
          <th>Apellidos</th>
        </tr>
      </thead>
      <tbody>
        @foreach($students as $student)
        <tr>
          <td>{{ $student->name }}</td>
          <td>{{ $student->lastname }}</td>
          <td width="20px">
            <a href="{{ route('estudiantes.show', $student->id) }}" class="btn btn-xs btn-info"> <i class="fa fa-fw fa-eye"></i> Ver </a>
          </td>
          <td width="20px">
            <a href="{{ route('estudiantes.edit', $student->id) }}" class="btn btn-xs btn-warning"> <i class="fa fa-fw fa-edit"></i> Editar </a>
          </td>
          <td width="20px">
            
            {!! Form::open(['route' => ['estudiantes.destroy', $student->id], 
              'method' => 'DELETE', 'onclick' => 'return confirm("Esta seguro de eliminar al estudiante?")']) 
            !!}
              
              {!! Form::button('<i class="fa fa-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs'] )  !!}
              
            {!! Form::close() !!}
            
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <a href="{{ URL::previous() }}" class="label label-info pull-right"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar </a>

    {{ $students->render() }}

  </div>
</div>

@stop


