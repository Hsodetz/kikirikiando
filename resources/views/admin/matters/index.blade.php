@extends('adminlte::page')

@section('title', 'Materias | all')

@section('content')

@include('sweetalert::alert')

<div class="panel panel-info">
  <div class="panel-heading">
    Listado de Materias
    <a href="{{ route('materias.create') }}" class="btn btn-xs btn-primary pull-right"> Crear </a>
  </div>
  <div class="panel-body">
    <table class="table responsive striped">
      <thead>
        <tr>
          <th>Nombre de la Materia</th>
          <th>Horario</th>
        </tr>
      </thead>
      <tbody>
        @foreach($matters as $matter)
        <tr>
          <td>{{ $matter->name }}</td>
          <td>{{ $matter->schedule }}</td>
          <td width="20px">
            <a href="{{ route('materias.show', $matter->id) }}" class="btn btn-xs btn-info"> <i class="fa fa-fw fa-eye"></i> Ver </a>
          </td>
          <td width="20px">
            <a href="{{ route('materias.edit', $matter->id) }}" class="btn btn-xs btn-warning"> <i class="fa fa-fw fa-edit"></i> Editar </a>
          </td>
          <td width="20px">
            
            {!! Form::open(['route' => ['materias.destroy', $matter->id], 
              'method' => 'DELETE', 'onclick' => 'return confirm("Esta seguro de eliminar la materia?")']) 
            !!}
              
              {!! Form::button('<i class="fa fa-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs'] )  !!}
              
            {!! Form::close() !!}
            
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <a href="{{ URL::previous() }}" class="label label-info pull-right"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar </a>

    {{ $matters->render() }}

  </div>
</div>

@stop


