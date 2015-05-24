<div class="modal fade" id="createRes" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">
					Create resource
				</h4>
			</div>
			<div class="modal-body">

				<div class="alert alert-danger" style="display:none">
					<ul id="messages">
						
					</ul>
				</div>

				{!! Form::open(['route' => 'admin.resources.store', 'method' => 'POST', 'id' => 'frm_create']) !!}
					@include('admin.resources.partials.fields')
				{!! Form::close() !!}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" onclick="createResource()">Guardar</button>
				<button type="button" class="btn btn-default" onclick="resetModal('createRes', 'frm_create')">Cancel</button>
			</div>
		</div>
	</div>
</div>