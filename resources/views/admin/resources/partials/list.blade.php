<table class="table table-striped">
	<tr>
		<th>#</th>
		<th>Title</th>
		<th>Description</th>
		<th>Tags</th>
		<th>Actions</th>
	</tr>
	@foreach($resources as $res)

	<tr>
		<td>{{ $res->id }}</td>
		<td>{{ $res->title }}</td>
		<td>
			{{ $res->description }}
			<p><a href="{{ $res->references }}">{{ $res->references }}</a></p>
		</td>
		<td>{{ $res->tags }}</td>
		<td>
			<button type="button" href="#" class="btn btn-default btn-sm" onclick="editResource({{ $res->id }})">
				<span class="glyphicon glyphicon-pencil"></span>
			</button>
			<button type="button" class="btn btn-danger btn-sm" onclick="destroyResource({{ $res->id }})">
				<span class="glyphicon glyphicon-remove"></span>
			</button>
		</td>
	</tr>
	@endforeach
</table>