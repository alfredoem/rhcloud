@extends('app')
@section('content')

<div class="container">
	<div class="row">
		<div class="panel panel-default">
			
			<div class="panel-heading">
				<h3 class="panel-title">
					Update Profile
				</h3>
			</div>

			<div class="panel-body">

			@include('admin.partials.messages')
				
			{!! Form::model($user, ['url' => url('/admin/users-profile'), 'method' => 'POST']) !!}
				
				<div class="form-group">
					{!! Form::label('first_name', 'First name') !!}
					{!! Form::text('first_name', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('last_name', 'Last name') !!}
					{!! Form::text('last_name', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('cur_password', 'Current Password') !!}
					{!! Form::password('cur_password', ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('password', 'Password') !!}
					{!! Form::password('password', ['class' => 'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('password_confirmation', 'Confirm password') !!}
					{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::button('Update profile', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}

					<a href="{{ url('/home') }}" class="btn btn-default">Cancelar</a>
				</div>
			
			{!! Form::close() !!}

			</div>



		</div>		
	</div>
</div>










@endsection