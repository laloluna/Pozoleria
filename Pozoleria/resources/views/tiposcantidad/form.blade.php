<div class="form-panel">
	<div class="form-group">
		{!! Form::label('nombre', 'Ingresa la unidad:'); !!}
		{!! Form::text('nombre'); !!}
	</div>
	<div class="form-group">
		{!! Form::submit($submit_text, ['class'=>'btn btn-success']); !!}
		{!! Form::close() !!}
	</div>
</div>
{!! Form::close() !!}