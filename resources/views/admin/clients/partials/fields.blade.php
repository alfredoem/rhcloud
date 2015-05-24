<div class="form-group">
	{!! Form::label('full_name', 'Nombre') !!}
	{!! Form::text('full_name', null, ['class' => 'form-control', 'required' => 'required', 'autofocus', 'onFocus' => 'this.select()']) !!}
</div>
<div class="form-group">
	{!! Form::label('email', 'E-mail') !!}
	{!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('address', 'Dirección') !!}
	{!! Form::text('address', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('phone_number', 'Teléfono') !!}
	{!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('type', 'Tipo') !!}
	{!! Form::select('type', [
		'empresa' => 'Empresa',
		'particular' => 'Particular',
		], null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<div class="form-group">
	{!! Form::label('register', 'Número de registros') !!}
	{!! Form::text('register', null, ['class' => 'form-control']) !!}
</div>