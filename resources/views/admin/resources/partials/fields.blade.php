
<div class="form-group">
	{!! Form::label('title', 'Title') !!}
	{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter title']) !!}	
</div>

<div class="form-group">
	{!! Form::label('references', 'References') !!}
	{!! Form::url('references', null, ['class' => 'form-control', 'placeholder' => 'ej. http://feelgood.esy.es']) !!}	
</div>

<div class="form-group">
	{!! Form::label('description', 'Description') !!}
	{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter description']) !!}	
</div>



