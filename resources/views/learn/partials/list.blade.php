@foreach(array_chunk($resources->getCollection()->all(), 3) as $resource_chunk)
	<div class="row">

		@foreach($resource_chunk as $res)
			<article class="col-md-4 text-center">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">{{ $res->title }}</h4>
						<img src="{{ $res->image }}" alt="" class="img-thumbnail">
					</div>
					<div class="panel-body">
						{{ $res->description }}
					</div>
					<div class="panel-footer">
						<a href="{{ $res->references }}">{{ $res->references }}</a>
					</div>
				</div>
			</article>
		@endforeach

	</div>
@endforeach