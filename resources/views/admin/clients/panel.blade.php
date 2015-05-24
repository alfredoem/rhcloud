@extends('app')
@section('content')


<div class="container" style="min-width:450px">
	
	<div class="row">
		<div class="panel panel-default">
			
			<div class="panel-heading">
				<div class="panel-title">
					@yield('panel-title', 'Clients')
				</div>
			</div>
			<div class="panel-body">
				@yield('panel-body')
			</div>

			<div class="panel-footer">
				@yield('panel-footer')
			</div>
		</div>
	</div>
	
</div>
@endsection