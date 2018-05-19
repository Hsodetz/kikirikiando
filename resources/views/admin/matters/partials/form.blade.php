
<div class="form-group">
  
  {!! Form::label('name', 'Nombre de la materia') !!}
  
  {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre de la materia']) !!}
  
</div>

<div class="form-group">
  
  {!! Form::label('schedule', 'Horario') !!}
    
  {!! Form::text('schedule', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el horario']) !!}
    
</div>

<div class="form-group">
  
  {{ Form::label('teacher_id', 'Profesor') }}
  {{ Form::select('teacher_id', $teachers, null, ['class' => 'form-control', 'placeholder' => 'Seleccione el profesor de la materia']) }}

</div>
  
<div class="form-group">
  
  {{ Form::label('school_id', 'Colegios') }}
  {{ Form::select('school_id', $schools, null, ['class' => 'form-control', 'placeholder' => 'Seleccione el colegio de la materia']) }}

</div>

<div class="form-group">
  
  {!! Form::button('Guardar &nbsp; <i class="fa fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-primary pull-right']) !!}
  <a href="{{ URL::previous() }}" class="label label-primary"> <i class="fa fa-arrow-left"></i> Regresar </a>
  
</div>

