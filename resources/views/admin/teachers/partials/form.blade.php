
<div class="form-group">
  
  {!! Form::label('name', 'Nombres') !!}
  
  {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Introduzca los nombres del profesor']) !!}
  
</div>

<div class="form-group">
  
  {!! Form::label('lastname', 'Apellidos') !!}
    
  {!! Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Introduzca los apellidos del profesor']) !!}
    
</div>

<div class="form-group">
  
  {{ Form::label('school_id', 'Colegios') }}
  {{ Form::select('school_id', $schools, null, ['class' => 'form-control', 'placeholder' => 'Seleccione el colegio al cual pertenece el profesor']) }}

</div>

<div class="form-group">
  
  {!! Form::label('email', 'Correo Electronico') !!}
    
  {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el correo electronico del padre']) !!}
    
</div>

<div class="form-group">
  
  {!! Form::label('phone', 'Telefono') !!}  <i class="fa fa-phone pull-right text-info" aria-hidden="true"></i> 
        
  {!! Form::number('phone', null, ['class' => 'form-control']) !!}
    
</div>

<div class="form-group">
  
  {!! Form::button(''.$boton.' &nbsp; <i class="'.$icon.'"></i>', ['type' => 'submit', 'class' => 'btn btn-primary pull-right']) !!}
  <a href="{{ URL::previous() }}" class="label label-primary"> <i class="fa fa-arrow-left"></i> Regresar </a>
  
</div>

