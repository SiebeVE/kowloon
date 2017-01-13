@extends('layouts.app')

@section('content')
	<h1 class="title-with-heart">Kowloon</h1>
	<div class="inner-content detail">
		<div class="product-details">
			<div class="product-images">
				<div class="slider slider-for">
					@forelse($product->getMedia() as $media)
						<div>
							<img src="{{$media->getUrl()}}"
								 alt="{{$product->name}} {{$product->category->name}} Kowloon">
						</div>
					@empty
						<div>
							<img src="/images/products/dogs/dog-cooling-mat.jpg"
								 alt="Dog product laying on cooling mat Kowloon">
						</div>
					@endforelse
				</div>
				<div class="slider slider-nav">
					@forelse($product->getMedia() as $media)
						<div>
							<div>
								<img src="{{$media->getUrl()}}"
									 alt="{{$product->name}} {{$product->category->name}} Kowloon">
								<div class="image-slick-nav"></div>
							</div>
							<p></p>
						</div>
					@empty
						<div>
							<div>
								<img src="/images/products/dogs/dog-cooling-mat.jpg"
									 alt="Dog product laying on cooling mat Kowloon">
								<div class="image-slick-nav"></div>
							</div>
							<p></p>
						</div>
					@endforelse
				</div>
			</div>
			<div class="product-detail">
				<div class="tags">
					<div class="tag category {{$category->css}}">
						{{$category->name}}
					</div>
					@foreach($product->tags as $tag)
						<div class="tag">
							{{$tag->name}}
						</div>
					@endforeach
				</div>
				<h2 class="product-title">{{$product->title}}</h2>
				<h3 class="product-price">&euro; {{$product->price}}</h3>
				@if(count($product->colors) > 0)
					<div class="product-colors">
						<h4 class="product-detail-title">{{getTranslatedContent('colors')}}</h4>
						@foreach($product->colors as $color)
							<span style="background-color:{{$color}}" class="product-color"></span>
						@endforeach
					</div>
				@endif
				<div class="product-description">
					<h4 class="product-detail-title">{{getTranslatedContent('description')}}</h4>
					<p>{{$product->description}}</p>
				</div>
			</div>
			<div class="product-specifications">
				<h4 class="product-detail-title">{{getTranslatedContent('specifications')}}</h4>
				<div class="product-specification">
					<h5 class="product-specification-title">{{getTranslatedContent('specifications-dimensions')}}</h5>
					<div class="item">
						<span class="indicator">S</span>
						<span class="actual">Ø 53x18cm</span>
					</div>
					<div class="item">
						<span class="indicator">M</span>
						<span class="actual">Ø 53x18cm</span>
					</div>
					<div class="item">
						<span class="indicator">L</span>
						<span class="actual">Ø 53x18cm</span>
					</div>
				</div>
			</div>
		</div>
		<div class="products">
			<h2 class="bold size-3">{{getTranslatedContent('related-products')}}</h2>
			@foreach($related as $item)
				<article class="product-item">
					<a href="{{ localizedUrl('detail', ["category" => $item->category->slug, "product" => $item->slug]) }}">
						<div class="product-image">
							@if(count($item->colors) > 0)
								<div class="colors">
									@foreach($item->colors as $color)
										<span style="background-color:{{$color}}" class="product-color"></span>
									@endforeach
								</div>
							@endif
							<div class="overlay {{$item->category->css}}-bg">
								<div class="vertical-align">
									<i class="icon icon-info"></i>
									<span>view details</span>
								</div>
							</div>
							@if($item->getMedia()->first() != NULL)
								<img src="{{$item->getMedia()->first()->getUrl()}}"
									 alt="{{$item->name}} {{$item->category->name}} Kowloon">
							@else
								<img src="/images/products/dogs/dog-cooling-mat.jpg"
									 alt="Dog product laying on cooling mat Kowloon">
							@endif
						</div>
						<div class="product-description">
							<span class="product-item-title">{{$item->name}}</span>
							<span class="product-item-price">&euro; {{$item->price}}</span>
						</div>
					</a>
				</article>
			@endforeach
			<a class="link-store choplin" href="#">{{getTranslatedContent('view-more')}}</a>
		</div>
		<section class="faqs">
			<h2 class="bold size-3">{{getTranslatedContent('faq-title')}}</h2>
			@foreach($product->faqs as $faq)
				<article class="faq">
					<h3 class="faq-title">{{$faq->question}}</h3>
					<p>{{$faq->answer}}</p>
				</article>
			@endforeach
		</section>
		@include('partials.banner')
	</div>
@endsection