@extends('admin.clients.panel')
@section('panel-title')
	Client's list
@endsection

@section('panel-body')

			@include('admin.partials.flash')
			<p>
				<a href="{{ route('admin.clients.create') }}" class="btn btn-info">Nuevo cliente</a>
			</p>
			
			<table class="table table-striped">
					<tr>
						<th>Name</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Address</th>
						<th>Type</th>
						<th>Register</th>
						<th>Actions</th>
					</tr>	
				
					@foreach($clients as $client)
					
					<tr data-id="{{ $client->id }}">
						<td> {{ $client->full_name }}</td>
						<td> {{ $client->phone_number }}</td>
						<td> {{ $client->email }}</td>
						<td> {{ $client->address }}</td>
						<td> {{ $client->type }}</td>
						<td> {{ $client->register }}</td>
						<td>
							<a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-default btn-sm">
								<span class="glyphicon glyphicon-pencil"></span>
							</a>
							<button id="delete_{{ $client->id }}" href="#" class="btn btn-danger btn-sm" onclick="deleteClient({{ $client->id }})">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
						</td>
					</tr>

					@endforeach
			</table>

		@section('panel-footer')
			{!! $clients->render() !!}
		@endsection

{!! Form::open(['route' => ['admin.clients.destroy', ':CLIENT_ID'], 'method' => 'DELETE', 'id' => 'form-delete','style' => 'display:none']) !!}
{!! Form::close() !!}


@endsection

@section('scripts')


<script>

$( document ).ready(function()
	{

		deleteClient = function(id)
		{
			var form = $('#form-delete');
			var url = form.attr('action').replace(':CLIENT_ID', id);

			var request = $.ajax({url: url, type: 'POST', data: form.serialize()});

			var div = $('div.panel-body');

			request.done(function(response)
			{
				var p = "<p id='flash' class='alert alert-success'>"+
						response
						"</p>";

				if($('#flash').length)
				{
					$('#flash').text(response);
				} else {
					div.prepend(p);
				}
				$("table tr[data-id='"+id+"']").fadeOut();
				
			});

		}

	});
	
</script>


@endsection