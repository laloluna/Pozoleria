<div class="form-panel">
	<div class="form-group">
		{!! Form::label('proveedor', 'Ingresa el proveedor: '); !!}
		{!! Form::text('nombre'); !!}
	</div>
	<div class="form-group">
		{!! Form::label('telefono', 'Ingrese el telefono del proveedor: '); !!}
		{!! Form::text('telefono'); !!}
	</div>
	<div class="form-group">
		{!! Form::submit($submit_text, ['class'=>'btn btn-success']); !!}
		{!! Form::close() !!}
	</div>
</div>
{!! Form::close() !!}