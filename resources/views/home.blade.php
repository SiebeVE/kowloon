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
		@if(count($hotItems) == 4)
			<section class="hot-items">
				<h2 class="size-1 bold">{{getTranslatedContent('home-title-hot-items')}}</h2>
				<div class="products">
					@foreach($hotItems as $item)
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
				</div>
				<a class="link-store choplin"
				   href="{{ localizedUrl('category', ["category" => $hotItems[0]->category->slug]) }}">{{getTranslatedContent('visit-store')}}</a>
			</section>
		@endif
		@include('partials.banner')
	</div>
@endsection
