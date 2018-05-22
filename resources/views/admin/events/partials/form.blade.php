
<div class="form-group">

  {!! Form::label('title', 'Titulo') !!}

  {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el Titulo']) !!}

</div>

<div class="form-group">

  {!! Form::label('detail', 'Detalle del Evento') !!}

  {!! Form::textarea('detail', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el detalle del Evento', 'rows' => '3']) !!}

</div>

<div class="form-group">

  {!! Form::label('country', 'Ciudad') !!}

  {!! Form::select('country', ['Quito' => 'Quito', 'Guayaquil' => 'Guayaquil'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione la ciudad']) !!}

</div>

<div class="form-group">

  {!! Form::label('event_day', 'Fecha del evento') !!}

  <input type="date" name="event_day" class="form-control">

</div>

<div class="form-group">

  {!! Form::label('image', 'Imagen') !!}
  {!! Form::file('image', ['class' => 'form-control']) !!}

</div>

<div class="form-group">

  {!! Form::button('Guardar &nbsp; <i class="fa fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-primary pull-right']) !!}
  <a href="{{ URL::previous() }}" class="label label-primary"> <i class="fa fa-arrow-left"></i> Regresar </a>

</div>
