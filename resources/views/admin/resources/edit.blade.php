
<div class="modal-dialog" id="modal-dialog-edit">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">
				Update resource
			</h4>
		</div>
		<div class="modal-body">
			{!! Form::model($resource,['route' => ['admin.resources.update', $resource->id], 'method' => 'PUT', 'id' => 'form_update']) !!}
				@include('admin.resources.partials.fields')
			{!! Form::close() !!}
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-success" onclick="updateResource({{ $resource->id }})">Guardar</button>
			<button type="button" class="btn btn-default" onclick="resetModal('editRes', 'form_update')">Cancel</button>
		</div>
	</div>
</div>


