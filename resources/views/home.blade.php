@extends('layouts.app')

@section('content')
	@include('partials.carousel')
	<h1 class="title-with-heart">Kowloon</h1>
	<div class="inner-content">
		<p class="brand-text">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
			dolore
			magna Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
			Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
			laborum.
		</p>
		<ul class="categories">
			<li><a href="{{route('category', 'dog')}}"><i class="icon-dog color-dog"></i>Dogs</a></li>
			<li><a href="{{route('category', 'cat')}}"><i class="icon-cat color-cat"></i>Cats</a></li>
			<li><a href="{{route('category', 'fish')}}"><i class="icon-fish color-fish"></i>Fish</a></li>
			<li><a href="{{route('category', 'bird')}}"><i class="icon-bird color-bird"></i>Birds</a></li>
			<li><a href="{{route('category', 'small-animals')}}"> <i class="icon-hamster color-hamster"></i>Small animals</a></li>
			<li><a href="{{route('category', 'other')}}"><i class="icon-other color-other"></i>Other</a></li>
		</ul>
		<section class="hot-items">
			<h2 class="size-1 bold">Hot items.</h2>
			<div class="products">
				<article class="product-item">
					<div class="product-image">
						<img src="/images/products/dogs/dog-cooling-mat.jpg">
					</div>
					<div class="product-description">
						<span class="product-item-title">Cooling mat</span>
						<span class="product-item-price">&euro; 15,49</span>
					</div>
				</article>
				<article class="product-item">
					<div class="product-image">
						<img src="/images/products/dogs/dog-cooling-mat.jpg">
					</div>
					<div class="product-description">
						<span class="product-item-title">Cooling mat</span>
						<span class="product-item-price">&euro; 15,49</span>
					</div>
				</article>
				<article class="product-item">
					<div class="product-image">
						<img src="/images/products/dogs/dog-cooling-mat.jpg">
					</div>
					<div class="product-description">
						<span class="product-item-title">Cooling mat</span>
						<span class="product-item-price">&euro; 15,49</span>
					</div>
				</article>
				<article class="product-item">
					<div class="product-image">
						<img src="/images/products/dogs/dog-cooling-mat.jpg">
					</div>
					<div class="product-description">
						<span class="product-item-title">Cooling mat</span>
						<span class="product-item-price">&euro; 15,49</span>
					</div>
				</article>
			</div>
			<a class="link-store choplin" href="#">Visit the store</a>
		</section>
		<div class="banner">
			<div class="exclusive">
				<p class="deals-first-read">discover amazing Kowloon deals!</p>
				<p class="deals-second-read">only in our newsletter</p>
			</div>
			<div class="email">
				<p class="size-3">Subscribe to our newsletter</p>
				<p class="text-helper">Lorum ipsum dolor sit amet.</p>
				<form>
					<label class="inline-button">
						<input name="email" type="email" placeholder="name@domain.com">
						<button class="inline" type="submit">Ok</button>
					</label>
				</form>
			</div>
		</div>
	</div>
@endsection
