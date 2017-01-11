@extends('layouts.app')

@section('content')
	@include('partials.carousel')
	<h1 class="title-with-heart">Kowloon</h1>
	<div class="inner-content">
		<p class="brand-text">{{getTranslatedContent('home-text-top')}}</p>
		<ul class="categories">
			@foreach($categories as $category)
				<li><a href="{{localizedUrl('category', $category->slug)}}"><i
								class="icon-{{$category->css}} color-{{$category->css}}"></i>{{$category->name}}</a>
				</li>
			@endforeach
		</ul>
		<section class="hot-items">
			<h2 class="size-1 bold">{{getTranslatedContent('home-title-hot-items')}}</h2>
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
			<a class="link-store choplin" href="#">{{getTranslatedContent('visit-store')}}</a>
		</section>
		@include('partials.banner')
	</div>
@endsection
