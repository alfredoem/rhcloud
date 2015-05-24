@extends('admin.clients.panel')
@section('panel-title')
	Update client
@endsection

@section('panel-body')

	@include('admin.partials.flash')
	@include('admin.partials.messages')

	{!! Form::model($client, ['route' => ['admin.clients.update', $client->id], 'method' => 'PUT']) !!}

		@include('admin.clients.partials.fields')

		<div class="form-group">
			{!! Form::button('Guardar cambios', ['type' => 'submit', 'class' => 'btn btn-success']) !!}

			<a href="{{ route('admin.clients.index') }}" class="btn btn-default">
				Cancelar
			</a>
		</div>

	{!! Form::close() !!}

@endsection