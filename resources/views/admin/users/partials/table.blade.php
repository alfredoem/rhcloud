<table id="aloha" class="table table-striped">
	<tr>
		<th>#</th>
		<th>Nombre</th>
		<th>Email</th>
		<th>Tipo</th>
		<th>Acciones</th>
	</tr>
	
	@foreach($users as $user)
	<tr data-id="{{ $user->id }}">
		<td>{{ $user->id }}</td>
		<td>{{ $user->full_name }}</td>
		<td>{{ $user->email }}</td>
		<td>{{ $user->type }}</td>
		<td>
			<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-default btn-sm">
				<span class="glyphicon glyphicon-pencil"></span>
			</a>
			
			<a href="#" class="btn btn-danger btn-sm">
				<span class="glyphicon glyphicon-remove">
				</span>
			</a>
			
		</td>
	</tr>
	@endforeach
</table>


