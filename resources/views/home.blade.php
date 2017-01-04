@extends('layouts.app')

@section('content')
	<div class="carousel slide" data-ride="carousel" id="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carousel" data-slide-to="0" class="active"></li>
			<li data-target="#carousel" data-slide-to="1"></li>
		</ol>
		
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="/images/carousel/dog-confeti.jpg" alt="Chania">
			</div>
			
			<div class="item">
				<img src="/images/carousel/dog-glasses.jpg" alt="Chania">
			</div>
		</div>
	</div>
	<h1>Kowloon</h1>
	<div class="brand-text">
	
	</div>
	<div class="categories">
	
	</div>
	<article class="hot-items">
		<h2>Hot Items.</h2>
	</article>
	<div class="deals">
	
	</div>
@endsection
