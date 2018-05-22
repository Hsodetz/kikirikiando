@extends('adminlte::page')

@section('title', 'Eventos | all')

@section('content')

@include('sweetalert::alert')

<div class="panel panel-info">
  <div class="panel-heading">
    Listado de eventos
    <a href="{{ route('eventos.create') }}" class="btn btn-xs btn-primary pull-right"> Crear </a>
  </div>
  <div class="panel-body">
    <table class="table responsive striped">
      <thead>
        <tr>
          <th>Titulo</th>
          <th>Ciudad</th>
          <th>Dia del evento</th>
        </tr>
      </thead>
      <tbody>
        @foreach($events as $event)
        <tr>
          <td>{{ $event->title }}</td>
          <td>{{ $event->country }}</td>
          <td> {{ $event->event_day }} </td>
          <td width="20px">
            <a href="{{ route('eventos.show', $event->id) }}" class="btn btn-xs btn-info"> <i class="fa fa-fw fa-eye"></i> Ver </a>
          </td>
          <td width="20px">
            <a href="{{ route('eventos.edit', $event->id) }}" class="btn btn-xs btn-warning"> <i class="fa fa-fw fa-edit"></i> Editar </a>
          </td>
          <td width="20px">

            {!! Form::open(['route' => ['eventos.destroy', $event->id],
              'method' => 'DELETE', 'onclick' => 'return confirm("Esta seguro de eliminar el evento?")'])
            !!}

              {!! Form::button('<i class="fa fa-trash"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs'] )  !!}

            {!! Form::close() !!}

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <a href="{{ URL::previous() }}" class="label label-info pull-right"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar </a>

    {{ $events->render() }}

  </div>
</div>

@stop
