@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Nuevo usuario</div>

				<div class="panel-body">
					
					@include('admin.partials.messages')

					{!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}

						 @include('admin.users.partials.fields')

						  <div class="form-group">
						  	{!! Form::submit('Create user', ['class' => 'btn btn-success']) !!}
						  	<a href="{{ route('admin.users.index') }}" class="btn btn-default">Cancel</a>
						  </div>

					{!! Form::close() !!}
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
