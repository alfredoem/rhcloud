@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Edit user: 
				{{ $user->first_name }}
				</div>

				<div class="panel-body">
					@include('admin.partials.flash')
					@include('admin.partials.messages')
					
					{!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) !!}

						  @include('admin.users.partials.fields')

						  <div class="form-group">
						  	{!! Form::submit('Update user', ['class' => 'btn btn-success']) !!}
						  	<a href="{{ route('admin.users.index') }}" class="btn btn-default">Cancel</a>
						  </div>

					{!! Form::close() !!}
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
