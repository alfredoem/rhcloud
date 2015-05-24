@extends('admin.clients.panel')
@section('panel-title')
	Create client
@endsection

@section('panel-body')

	@include('admin.partials.messages')

	{!! Form::open(['route' => 'admin.clients.store', 'method' => 'POST', 'novalidate']) !!}

		@include('admin.clients.partials.fields')

		<div class="form-group">
			{!! Form::button('Guardar', ['type' => 'submit', 'class' => 'btn btn-success']) !!}
			<a href="{{ route('admin.clients.index') }}" class="btn btn-default">
			Cancelar
		</a>
		</div>
	{!! Form::close() !!}

@endsection