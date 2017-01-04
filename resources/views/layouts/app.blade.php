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
	<nav class="navbar opened-">
		<div class="hamburger">
			<i class="icon-menu"></i>
		</div>
		<ul class="help">
			<li><a href="#"><i class="icon-search"></i>Search</a></li>
			<li><a href="#"><i class="icon-question-mark"></i>FAQ</a></li>
		</ul>
		<ul class="links">
			<li><a href="#"><i class="icon-dog"></i>Dogs</a></li>
			<li><a href="#"><i class="icon-cat"></i>Cats</a></li>
			<li><a href="#"><i class="icon-fish"></i>Fish</a></li>
			<li><a href="#"><i class="icon-bird"></i>Birds</a></li>
			<li><a href="#"><i class="icon-hamster"></i>Small animals</a></li>
		</ul>
		<div class="footer choplin">
			Kowloon
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
