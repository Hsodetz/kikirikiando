
<div class="form-group">
  
  {!! Form::label('name', 'Nombre del Colegio') !!}
  
  {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Introduzca el nombre del colegio']) !!}
  
</div>

<div class="form-group">
  
  {!! Form::label('city', 'Ciudad') !!}
      
  {!! Form::select('city', ['Quito' => 'Quito', 'Guayaquil' => 'Guayaquil'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione la ciudad']) !!}
     
</div>

<div class="form-group">
  
  {!! Form::label('address', 'Direccion') !!}
    
  {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Introduzca la direccion del colegio']) !!}
    
</div>

<div class="form-group">
  
  {!! Form::button('Guardar &nbsp; <i class="fa fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-primary pull-right']) !!}
  <a href="{{ URL::previous() }}" class="label label-primary"> <i class="fa fa-arrow-left"></i> Regresar </a>
  
</div>

