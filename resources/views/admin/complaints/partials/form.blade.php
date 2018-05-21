<div class="form-group">

  {!! Form::label('father_id', 'Nombre del Padre Denunciante') !!}

  {!! Form::select('father_id', $fathers, null, ['class' => 'form-control', 'placeholder' => 'Seleccione el Padre']) !!}

</div>

<div class="form-group">

  {!! Form::label('student_id', 'Nombre del Estudiante') !!}

  {!! Form::select('student_id', $students, null, ['class' => 'form-control', 'placeholder' => 'Seleccione el estudiante']) !!}

</div>

<div class="form-group">

  {!! Form::label('affair', 'Asunto') !!}

  {!! Form::text('affair', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el Asunto']) !!}

</div>

<div class="form-group">

  {!! Form::label('text', 'Descripcion') !!}

  {!! Form::textarea('text', null, ['class' => 'form-control', 'placeholder' => 'Agregue descripcion', 'rows' => '3']) !!}

</div>

<div class="form-group">

  {!! Form::label('image', 'Imagen') !!}
  {!! Form::file('image', ['class' => 'form-control']) !!}

</div>

<div class="form-group">

  {!! Form::label('file', 'Archivo') !!}
  {!! Form::file('file', ['class' => 'form-control']) !!}

</div>

<div class="form-group">

  {!! Form::label('gravity', 'Gravedad') !!}
  <br>
  <label>
    {!! Form::radio('gravity', 'HIGH') !!} Alta
  </label>
  &nbsp
  <label>
    {!! Form::radio('gravity', 'MEDIUM') !!} Media
  </label>
  &nbsp
  <label>
    {!! Form::radio('gravity', 'LOW') !!} Baja
  </label>

</div>

<div class="form-group">

  {!! Form::button('Guardar &nbsp; <i class="fa fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-primary pull-right']) !!}
  <a href="{{ URL::previous() }}" class="label label-primary"> <i class="fa fa-arrow-left"></i> Regresar </a>

</div>
