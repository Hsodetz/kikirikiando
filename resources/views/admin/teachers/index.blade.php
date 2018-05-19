@extends('adminlte::page')

@section('title', 'Profesores | all')

@section('content')

@include('sweetalert::alert')

<div class="panel panel-info">
  <div class="panel-heading">
    Listado de Profesores
    <a href="{{ route('profesores.create') }}" class="btn btn-xs btn-primary pull-right"> Crear </a>
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
        @foreach($teachers as $teacher)
        <tr>
          <td>{{ $teacher->name }}</td>
          <td>{{ $teacher->lastname }}</td>
          <td width="20px">
            <a href="{{ route('profesores.show', $teacher->id) }}" class="btn btn-xs btn-info"> <i class="fa fa-fw fa-eye"></i> Ver </a>
          </td>
          <td width="20px">
            <a href="{{ route('profesores.edit', $teacher->id) }}" class="btn btn-xs btn-warning"> <i class="fa fa-fw fa-edit"></i> Editar </a>
          </td>
          <td width="20px">
            
            {!! Form::open(['route' => ['profesores.destroy', $teacher->id], 
              'method' => 'DELETE', 'onclick' => 'return confirm("Esta seguro de eliminar al padre?")']) 
            !!}
              
              {!! Form::button('<i class="fa fa-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs'] )  !!}
              
            {!! Form::close() !!}
            
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <a href="{{ URL::previous() }}" class="label label-info pull-right"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar </a>

    {{ $teachers->render() }}

  </div>
</div>

@stop


