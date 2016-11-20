<div class="form-panel">
	<div class="form-group">
		{!! Form::label('materiaPrima', 'Ingresa la materia prima:'); !!}
		{!! Form::select('materiaPrima', $materiasPrimas, $firstM); !!}
	</div>
	<div class="form-group">
		{!! Form::label('cantidad', 'Escriba la cantidad de producto'); !!}
		{!! Form::number('cantidad'); !!}
	</div>
	<div class="form-group">
		{!! Form::submit($submit_text, ['class'=>'btn btn-success']); !!}
		{!! Form::close() !!}
	</div>
</div>
{!! Form::close() !!}