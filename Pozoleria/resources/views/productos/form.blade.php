<div class="form-panel">
	<div class="form-group">
		{!! Form::label('producto', 'Ingresa el producto: '); !!}
		{!! Form::text('nombre'); !!}
	</div>
    <div class="form-group">
		{!! Form::label('alias', 'Ingrese el alias del producto: '); !!}
		{!! Form::text('alias'); !!}
	</div>
    <div class="form-group">
		{!! Form::label('precio', 'Ingrese el precio del producto: '); !!}
		{!! Form::number('precio'); !!}
	</div>
    <!--demas pendejadas-->
	<div class="form-group">
		{!! Form::submit($submit_text, ['class'=>'btn btn-success']); !!}
		{!! Form::close() !!}
	</div>
</div>
{!! Form::close() !!}