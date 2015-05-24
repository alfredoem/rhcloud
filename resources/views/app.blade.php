<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>
	
	{!! Html::style('css/app.css') !!}
	{{--<link href="{{ asset('/css/app.css') }}" rel="stylesheet">--}}

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	 <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.5/angular.min.js"></script>
</head>
<body ng-app="myApp">
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand lobster" href="{{ url('/home') }}">FeelGood Inc</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Games</a></li>
					<li><a href="{{ url('/') }}">Music</a></li>
					<li><a href="{{ url('/') }}">Forum</a></li>
					<li><a href="{{ url('/') }}">Shop</a></li>
					@if( ! Auth::guest())
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								Manage <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/admin/users') }}">Users</a></li>
								<li><a href="{{ url('/admin/clients') }}">Clients</a></li>
								<li><a href="{{ url('/admin/resources') }}">Resources</a></li>
							</ul>
						</li>
						
					@endif
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
						<li><a href="{{ route('contact.index') }}">Contact us</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							{{ Auth::user()->first_name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
								<li><a href=" {{ url('/admin/users-profile') }}">
								Profile
								</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')


	<footer class="footer" ng-controller="MainController">
		<div class="container">
			<p class="text-muted">&copy; Feel Good inc. 2015. All rights reserved @{{ smile }}</p>
		</div>
	</footer>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/controllers/Maincontroller.js') }}"></script>

	@yield('scripts')
</body>
</html>
