
<div class="form-group">

  {!! Form::label('matter', 'Materias') !!}

  @foreach ($matters as $matter)

  <br>

    {!! Form::radio('matter[]', $matter->id) !!} {{ $matter->name }}

  @endforeach

</div>

<hr>

<div class="form-group">

  {!! Form::label('assistance_result', 'Asistencias') !!}
  <br>

  @foreach ($students as $student)

    {!! Form::checkbox('student[]', $student->id, 'checked') !!} {{ $student->name }} {{ $student->lastname }}

    {!! Form::checkbox('assistance_result[]', 'PRESENT') !!} Presente
    {!! Form::checkbox('assistance_result[]', 'JUSTIFY') !!} Justificado
    {!! Form::checkbox('assistance_result[]', 'NOPRESENT') !!} Inasistente
    <br>
  @endforeach

</div>

<div class="form-group">

  <input type="datetime-local" name="date_time[]" id="date_time">

</div>

<div class="form-group">

  {!! Form::button('Guardar &nbsp; <i class="fa fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-primary pull-right']) !!}
  <a href="{{ URL::previous() }}" class="label label-primary"> <i class="fa fa-arrow-left"></i> Regresar </a>

</div>
