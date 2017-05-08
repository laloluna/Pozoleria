<div class="form-panel">
	<div class="form-group">
		{!! Form::label('mesa', 'Ingresa el nombre de mesa: '); !!}
		{!! Form::text('nombre'); !!}
	</div>
    <!--demas pendejadas-->
	<div class="form-group">
		{!! Form::submit($submit_text, ['class'=>'btn btn-success']); !!}
		{!! Form::close() !!}
	</div>
</div>
{!! Form::close() !!}