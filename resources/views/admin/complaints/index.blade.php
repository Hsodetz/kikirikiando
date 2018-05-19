@extends('adminlte::page')

@section('title', 'Denuncias | all')

@section('content')

@include('sweetalert::alert')

<div class="panel panel-info">
  <div class="panel-heading">
    Listado de denuncias
    <a href="{{ route('denuncias.create') }}" class="btn btn-xs btn-primary pull-right"> Crear </a>
  </div>
  <div class="panel-body">
    <table class="table responsive striped">
      <thead>
        <tr>
          <th>Padre Denunciante</th>
          <th>Estudiante</th>
          <th>Asunto</th>
          <th>Gravedad</th>
        </tr>
      </thead>
      <tbody>
        @foreach($complaints as $complaint)
        <tr>
          <td>{{ $complaint->father->name }}</td>
          <td>{{ $complaint->student->name }}</td>
          <td> {{ $complaint->affair }} </td>
          <td> {{ $complaint->gravity }} </td>
          <td width="20px">
            <a href="{{ route('denuncias.show', $complaint->id) }}" class="btn btn-xs btn-info"> <i class="fa fa-fw fa-eye"></i> Ver </a>
          </td>
          <td width="20px">
            <a href="{{ route('denuncias.edit', $complaint->id) }}" class="btn btn-xs btn-warning"> <i class="fa fa-fw fa-edit"></i> Editar </a>
          </td>
          <td width="20px">

            {!! Form::open(['route' => ['denuncias.destroy', $complaint->id],
              'method' => 'DELETE', 'onclick' => 'return confirm("Esta seguro de eliminar la denuncia?")'])
            !!}

              {!! Form::button('<i class="fa fa-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs'] )  !!}

            {!! Form::close() !!}

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <a href="{{ URL::previous() }}" class="label label-info pull-right"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar </a>

    {{ $complaints->render() }}

  </div>
</div>

@stop
