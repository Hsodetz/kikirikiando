@extends('adminlte::page')

@section('title', 'Padres | all')

@section('content')

@include('sweetalert::alert')

<div class="panel panel-info">
  <div class="panel-heading">
    Listado de Padres
    <a href="{{ route('padres.create') }}" class="btn btn-xs btn-primary pull-right"> Crear </a>
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
        @foreach($fathers as $father)
        <tr>
          <td>{{ $father->name }}</td>
          <td>{{ $father->lastname }}</td>
          <td width="20px">
            <a href="{{ route('padres.show', $father->id) }}" class="btn btn-xs btn-info"> <i class="fa fa-fw fa-eye"></i> Ver </a>
          </td>
          <td width="20px">
            <a href="{{ route('padres.edit', $father->id) }}" class="btn btn-xs btn-warning"> <i class="fa fa-fw fa-edit"></i> Editar </a>
          </td>
          <td width="20px">

            {!! Form::open(['route' => ['padres.destroy', $father->id],
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

    {{ $fathers->render() }}

  </div>
</div>

@stop
