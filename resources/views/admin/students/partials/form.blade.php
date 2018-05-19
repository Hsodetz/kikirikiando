
<div class="form-group">
  
  {!! Form::label('name', 'Nombres') !!}
  
  {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Introduzca los nombres del estudiante']) !!}
  
</div>

<div class="form-group">
  
  {!! Form::label('lastname', 'Apellidos') !!}
    
  {!! Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Introduzca los apellidos del estudiante']) !!}
    
</div>

<div class="form-group">
  
  {{ Form::label('father_id', 'Padres') }}
  {{ Form::select('father_id', $fathers, null, ['class' => 'form-control', 'placeholder' => 'Seleccione el Padre del estudiante']) }}

</div>

<div class="form-group">
  
  {{ Form::label('school_id', 'Colegios') }}
  {{ Form::select('school_id', $schools, null, ['class' => 'form-control', 'placeholder' => 'Seleccione el colegio del estudiante']) }}

</div>


<div class="form-group">
  
  {!! Form::label('age', 'Edad') !!}
        
  {!! Form::number('age', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la edad del estudiante']) !!}
    
</div>

<div class="form-group">
  
  {!! Form::label('registration_number', 'Numero de Registro') !!}
        
  {!! Form::number('registration_number', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de registro del estudiante']) !!}
    
</div>

<div class="form-group">
  
  {!! Form::button('Guardar &nbsp; <i class="fa fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-primary pull-right']) !!}
  <a href="{{ URL::previous() }}" class="label label-primary"> <i class="fa fa-arrow-left"></i> Regresar </a>
  
</div>

