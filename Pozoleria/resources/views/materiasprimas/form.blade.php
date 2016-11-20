<div class="form-panel">
	<div class="form-group">
		{!! Form::label('nombre', 'Ingresa la materia prima: '); !!}
		{!! Form::text('nombre'); !!}
	</div>
	<div class="form-group">
		{!! Form::label('tipoCantidad', 'Selecciona la unidad de la materia prima: '); !!}
		{!! Form::select('tipoCantidad', $unidades, $firstU); !!}
	</div>
	<div class="form-group">
		{!! Form::label('precio', 'Ingrese el precio: '); !!}
		{!! Form::number('precio'); !!}
	</div>
    <div class="form-group">
		{!! Form::label('proveedor', 'Ingrese el proveedor: '); !!}
		{!! Form::select('proveedor', $proveedores, $firstP); !!}
	</div>
	<div class="form-group">
		{!! Form::submit($submit_text, ['class'=>'btn btn-success']); !!}
		{!! Form::close() !!}
	</div>
</div>
{!! Form::close() !!}