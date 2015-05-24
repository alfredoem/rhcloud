<div class="form-group">
{!! Form::label('email', 'E-mail Address') !!}
{!! Form::text('email', null, ['class'=> 'form-control', 'placeholder' => 'Enter e-mail address']) !!}
</div>

<div class="form-group">
{!! Form::label('password', 'Password') !!}
{!! Form::password('password', ['class'=> 'form-control', 'placeholder' => 'Enter password']) !!}
</div>

<div class="form-group">
{!! Form::label('first_name', 'First Name') !!}
{!! Form::text('first_name', null, ['class'=> 'form-control', 'placeholder' => 'Enter first name']) !!}
</div>

<div class="form-group">
{!! Form::label('last_name', 'Last Name') !!}
{!! Form::text('last_name', null, ['class'=> 'form-control', 'placeholder' => 'Enter last name']) !!}
</div>

<div class="form-group">
{!! Form::label('type', 'User Type') !!}
{!! Form::select('type', [
		'' => 'Select type',
		'admin' => 'Admin',
		'user' => 'User'
		], null, 
		['class'=> 'form-control']) 
!!}
</div>