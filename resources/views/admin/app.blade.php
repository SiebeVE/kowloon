<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>{{ config('app.name', 'Laravel') }}</title>
	
	<!-- Styles -->
	<link href="/css/app.css" rel="stylesheet">
</head>
<body>
<div id="app" class="container">
	<nav class="navbar">
		<div class="hamburger" id="menu-toggle">
			<i class="icon-menu"></i>
		</div>
		<ul>
			@if(Auth::guest())
				<li><a href="{{route('admin-login')}}" class="dog-hover"><i class="fa fa-sign-in"></i>Login</a></li>
			@else
				<li><a href="{{route('admin-dashboard')}}" class="dog-hover"><i class="fa fa-home"></i>Home</a></li>
				<li><a href="{{route('admin-logout')}}" class="dog-hover"><i class="fa fa-sign-out"></i>Logout</a></li>
			@endif
		</ul>
		{{--<ul class="contact">--}}
			{{--<li><a href="{{route('about-us')}}"><i class="icon-contact"></i>Contact</a></li>--}}
		{{--</ul>--}}
		<ul class="links">
			<li class="dog-hover"><a href="{{route('admin-tag-view')}}"><i class="fa fa-tags"></i>Tags</a></li>
			<li class="dog-hover"><a href="{{route('admin-faq-view')}}"><i class="fa fa-question-circle"></i>FAQ</a></li>
			<li class="dog-hover"><a href="{{route('admin-product-view')}}"><i class="fa fa-shopping-cart"></i>Products</a></li>
		</ul>
		<div class="footer choplin">
			<a id="kowloon-menu-footer" href="{{ route('home') }}">Kowloon</a>
		</div>
	</nav>
	<div class="content">
		@yield('content')
	</div>
	@if (session()->has('messageToastr'))
		<div class="hidden" id="messageToastr" data-style="{{ session('messageToastr')["style"] }}">
			<span class="title">{{ session('messageToastr')["title"] }}</span>
			<span class="content">{!! session('messageToastr')["content"] !!}</span>
		</div>
	@endif
</div>

<!-- Scripts -->
<script>
	window.Laravel = <?php echo json_encode( [
		'csrfToken' => csrf_token(),
	] ); ?>
</script>
<script src="/js/app.js"></script>
</body>
</html>