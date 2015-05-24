@extends('admin.clients.panel')

@section('panel-title')
	Resources list
@endsection

@section('panel-body')
	
	<p>
		<button class="btn btn-success" data-toggle="modal" data-target="#createRes">Create resource</button>
	</p>
	
	{{-- Modals --}}
	@include('admin.resources.create')
	
	{!! Form::open(['route' => ['admin.resources.edit', ':RESOURCE_ID'], 'method' => 'PUT', 'id' => 'frm_edit']) !!}
	{!! Form::close() !!}

	{!! Form::open(['route' => ['admin.resources.destroy', ':RESOURCE_ID'], 'method' => 'DELETE', 'id' => 'frm_destroy']) !!}
	{!! Form::close() !!}

	<div class="modal fade" id="editRes" role="dialog">

	</div>
	
	<div id="lista">
		@include('admin.resources.partials.list')
	</div>
	
@endsection

@section('panel-footer')
		{!! $resources->render() !!}
@endsection

@section('scripts')
	
<script>
	$(document).ready(function(){

		reloadTable = function(response)
		{
			$('.table').remove();
			$('#lista').append(response.table);
			$('.pagination').remove();
			$('.panel-footer').append(response.pagination);
		}

		destroyResource = function(id)
		{
			var form = $('#frm_destroy');
			var url = form.attr('action').replace(':RESOURCE_ID', id);
			var request = $.ajax({url: url, type: 'POST', data: form.serialize()});
			request.done(function(response){
				reloadTable(response);
			});
		}

		editResource = function(id)
		{
			var form = $('#frm_edit');
			var url = form.attr('action').replace(':RESOURCE_ID', id);
			var request = $.ajax({url: url, type:'GET', data: {}});

			request.done(function(response){
				if($('#modal-dialog-edit').length){
					$('#modal-dialog-edit').remove()
				}
				$('#editRes').append(response).modal('show');

			});
		}

		updateResource = function()
		{
			var form = $('#form_update');
			var url = form.attr('action');
			var request = $.ajax({url: url, type: 'POST', data: form.serialize()});
			request.done(function(response){
				reloadTable(response);
				resetModal('editRes', 'form_update');
			});

			request.fail(function(){
				console.log('-.-');
			})

		}

		resetModal = function(modal, form)
		{
			$('#'+modal).modal('hide');
			$('#'+form)[0].reset();
		}

		createResource = function()
		{	
			var form = $('#frm_create');
			var url = form.attr('href');
			var request = $.ajax({url: url, type:'POST', data: form.serialize()});
			request.done(function(response){
				reloadTable(response);
				$('#createRes').modal('hide');
			});

			request.fail(function(jqxhr){
				$('#messages').remove();
				$('.alert').append("<ul id='messages'></ul>").show();
				$.each(jqxhr.responseJSON, function(key, value){
					$('#messages').append('<li>' + value + '</li>');
				});
			});
		}

	});// end document.ready
</script>

@endsection



