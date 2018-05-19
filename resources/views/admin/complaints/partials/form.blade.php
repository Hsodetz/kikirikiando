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
{{--
<div class="form-group">

  {!! Form::label('address', 'Direccion') !!}

  {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Introduzca la direccion del colegio']) !!}

</div>
--}}

<div class="form-group">

  {!! Form::button('Guardar &nbsp; <i class="fa fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-primary pull-right']) !!}
  <a href="{{ URL::previous() }}" class="label label-primary"> <i class="fa fa-arrow-left"></i> Regresar </a>

</div>
