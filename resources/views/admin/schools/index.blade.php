@extends('adminlte::page')

@section('title', 'Colegios | all')

@section('content')

@include('sweetalert::alert')

<div class="panel panel-info">
  <div class="panel-heading">
    Listado de Colegios
    <a href="{{ route('colegios.create') }}" class="btn btn-xs btn-primary pull-right"> Crear </a>
  </div>
  <div class="panel-body">
    <table class="table responsive striped">
      <thead>
        <tr>
          <th>Nombres</th>
          <th>Ciudad</th>
        </tr>
      </thead>
      <tbody>
        @foreach($schools as $school)
        <tr>
          <td>{{ $school->name }}</td>
          <td>{{ $school->city }}</td>
          <td width="20px">
            <a href="{{ route('colegios.show', $school->id) }}" class="btn btn-xs btn-info"> <i class="fa fa-fw fa-eye"></i> Ver </a>
          </td>
          <td width="20px">
            <a href="{{ route('colegios.edit', $school->id) }}" class="btn btn-xs btn-warning"> <i class="fa fa-fw fa-edit"></i> Editar </a>
          </td>
          <td width="20px">
            
            {!! Form::open(['route' => ['colegios.destroy', $school->id], 
              'method' => 'DELETE', 'onclick' => 'return confirm("Esta seguro de eliminar el colegio?")']) 
            !!}
              
              {!! Form::button('<i class="fa fa-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs'] )  !!}
              
            {!! Form::close() !!}
            
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <a href="{{ URL::previous() }}" class="label label-info pull-right"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar </a>

    {{ $schools->render() }}

  </div>
</div>

@stop


