
{!! Form::open(['route' => ['admin.users.destroy' , $user->id], 'method' => 'DELETE', 'style' => 'display:inline-block']) !!}

	<button type="submit" onclick="return confirm('Seguro que desea eliminar?')" class="btn btn-danger btn-sm">
		<span class="glyphicon glyphicon-remove"></span>
	</button>
{!! Form::close() !!}