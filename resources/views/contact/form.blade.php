@extends('app')
@section('content')

<div class="container">
	
	<div class="row">
		
		<div class="">

			<div class="panel panel-default">

				<div class="panel-heading">
					<h3 class="panel-title">
					Contact us
					</h3>
				</div>

				<div class="panel-body">

				@include('admin.partials.messages')

				{!! Form::open(['url' => url('contact/send'), 'method' => 'POST']) !!}
					
				<div class="form-group">
					{!! Form::label('email', 'E-mail address') !!}
					{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter e-mail address']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('subject', 'Subject') !!}
					{!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Enter subject']) !!}
				</div>

				<div class="form-group">
					{!! Form::textarea('message_body', null, ['class' => 'form-control', 'placeholder' => 'Enter message']) 
					!!}
				</div>

				<div class="form-group">
					{!! Form::button('Enviar', ['type' => 'submit', 'class' => 'btn btn-success']) !!}
				</div>

				{!! Form::close() !!}


				</div>
				
			</div>
			
		</div>


	</div>


</div>


@endsection