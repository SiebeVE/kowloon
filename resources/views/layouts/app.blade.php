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
		<ul class="language_bar_chooser">
			@foreach(getSupportedLocales() as $localeCode => $properties)
				<li>
					<a rel="alternate" hreflang="{{$localeCode}}"
					   href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
						<i class="flag-icon flag-icon-{{getCountry( $properties["regional"])}}"></i>
						{{ $properties['native'] }}
					</a>
				</li>
			@endforeach
		</ul>
		<ul class="help">
			<li><a href="#"><i class="icon-search"></i>{{getTranslatedContent("menu-search")}}</a></li>
			<li><a href="#"><i class="icon-question-mark"></i>{{getTranslatedContent("menu-faq")}}</a></li>
		</ul>
		<ul class="contact">
			<li><a href="{{localizedUrl('about-us')}}"><i
							class="icon-contact"></i>{{getTranslatedContent("menu-contact")}}</a></li>
		</ul>
		<ul class="links">
			@foreach($categories as $category)
				<li class="{{$category->css}}-hover"><a href="{{localizedUrl('category', $category->slug)}}"><i
								class="icon-{{$category->css}}"></i>{{$category->name}}</a></li>
			@endforeach
		</ul>
		<div class="footer choplin">
			<a id="kowloon-menu-footer" href="{{ localizedUrl('home') }}">Kowloon</a>
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
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	
	ga('create', 'UA-90312795-1', 'auto');
	ga('send', 'pageview');

</script>
<script src="/js/app.js"></script>
</body>
</html>
