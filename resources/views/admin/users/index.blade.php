@extends('admin.partials.panel')

@section('panel-title')
	User list
@endsection

@if(session()->has('message'))

	<p class="alert alert-success">
		{{ session()->get('message')}}
	</p>

@endif

@section('panel-body')



{!! Form::open(['route' => 'admin.users.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
	
	{!! Form::select('type', ['' => 'All user type', 'admin' => 'Admin', 'user'  => 'User'], $filter_type, ['class' => 'form-control']) !!}
	<div class="input-group">
		{!! Form::text('name', $filter_name, ['class' => 'form-control', 'placeholder' => 'Enter user name']) !!}
		<div class="input-group-btn">
			<button id="btn_search" type="button" class="btn btn-default" onclick="search()">
				<span class="glyphicon glyphicon-search"></span>
			</button>	
		</div>
	</div>

{!! Form::close() !!}

	<p><a href="{{ route('admin.users.create') }}" class="btn btn-info" role="button">Nuevo usuario</a></p>
	<p>Mostrando <span id="users_count">{{ $users->count() }}</span> de <span id="users_total">{{ $users->Total() }}</span> usuarios registrados</p>
	
	@include('admin.users.partials.table')
	
	@section('panel-footer')
		{!! $users->render() !!}
	@endsection
{!! Form::open(['route' => ['admin.users.destroy' , ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete', 'style' => 'display:none']) !!}

{!! Form::close() !!}

@endsection


@section('scripts')
	<script>
		$(document).ready(function(){

			$('.btn-danger').click(function(e){
				e.preventDefault();

				var row = $(this).parents('tr');
				var id = row.data('id');
				var form = $('#form-delete');
				var url = form.attr('action').replace(':USER_ID', id);
				var data =  form.serialize();


				var request = $.ajax({url: url, type: 'POST', data: data});

				request.fail(function(response){
					alert('El usuario no fue eliminado');
				});

				request.done(function(response){
					row.fadeOut();
				});

			});

			search = function()
			{

				$('#btn_search').attr('disabled', true);
				var param = 'type='+ $("select[name='type'] option:selected").val() +'&name=' + $("input[name='name']").val();
				$.ajax({
					url: '/admin/users?' + param,
					dataType: 'json',
				}).done(function(response){
						$('#aloha').html(response.table);
						$('.panel-footer').html(response.pagination);
						$('#users_count').html(response.count);
						$('#users_total').html(response.total);
						
						if(window.location.hash == '')
						{
							history.pushState({}, '', '/admin/users?'+param);
						}
						$('#btn_search').attr('disabled', false);
						
				}).fail(function(){
					console.log('Users could not be loaded.');
					$('#btn_search').attr('disabled', false);
				});


			}

		});// End document.ready
	</script>
@endsection