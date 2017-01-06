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
		<ul class="help">
			<li><a href="#"><i class="icon-search"></i>Search</a></li>
			<li><a href="#"><i class="icon-question-mark"></i>FAQ</a></li>
		</ul>
		<ul class="contact">
			<li><a href="{{route('about-us')}}"><i class="icon-contact"></i>Contact</a></li>
		</ul>
		<ul class="links">
			<li class="dog-hover"><a href="{{route('category', 'dog')}}"><i class="icon-dog"></i>Dogs</a></li>
			<li class="cat-hover"><a href="{{route('category', 'cat')}}"><i class="icon-cat"></i>Cats</a></li>
			<li class="fish-hover"><a href="{{route('category', 'fish')}}"><i class="icon-fish"></i>Fish</a></li>
			<li class="bird-hover"><a href="{{route('category', 'bird')}}"><i class="icon-bird"></i>Birds</a></li>
			<li class="hamster-hover"><a href="{{route('category', 'small-animals')}}"><i class="icon-hamster"></i>Small animals</a></li>
			<li class="other-hover"><a href="{{route('category', 'other')}}"><i class="icon-other"></i>Other</a></li>
		</ul>
		<div class="footer choplin">
			<a id="kowloon-menu-footer" href="{{ route('home') }}">Kowloon</a>
		</div>
	</nav>
	<div class="content">
		@yield('content')
	</div>
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
