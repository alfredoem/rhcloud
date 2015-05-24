@extends('app')


@section('content')


<div class="container">
	
	<div class="row">

		<div>
			<img src="http://placekitten.com/1170/275" alt="" title="Cat" class="img-responsive img-thumbnail" />
			<div class="jumbotron">
				<h1>
					FeelGood Inc
				</h1>
				<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae dolores ducimus similique minima fuga illum adipisci veniam, dolorum laboriosam illo atque impedit, tempore maxime consectetur aperiam dicta explicabo modi deleniti debitis, rerum! Commodi provident fugit excepturi a, voluptates earum! Aspernatur.
				</p>
			</div>

		</div>
			
		<div id="accordion">
			@include('learn.partials.list')
		</div>

	</div>
	{!! $resources->render() !!}
</div>

@endsection
