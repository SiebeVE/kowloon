@extends('layouts.app')

@section('content')
	@include('partials.carousel')
	<h1 class="title-with-heart">Kowloon</h1>
	<div class="inner-content overview">
		<div class="tags">
			<div class="tag category {{$category->css}}">
				{{$category->name}}
			</div>
		</div>
		<h1 class="bold size-1">{{$category->name}} {{getTranslatedContent('overview-title-articles')}}.</h1>
		<div class="filter opened">
			<p class="title choplin" id="filter-toggle">{{getTranslatedContent('filter')}}</p>
			<div class="filter-content">
				<div class="by-collection">
					<p class="filter-title">{{getTranslatedContent('overview-filter-collection')}}</p>
					<div class="filter-groups">
						@foreach($tags as $tag)
							<div class="filter-group">
								<input id="{{$tag->slug}}" type="checkbox">
								<label for="{{$tag->slug}}">{{ $tag->name }}</label>
							</div>
						@endforeach
						<div class="filter-group">
							<input id="luxury" type="checkbox">
							<label for="luxury">Luxury</label>
						</div>
						<div class="filter-group">
							<input id="new" type="checkbox">
							<label for="new">new</label>
						</div>
						<div class="filter-group">
							<input id="on-sale" type="checkbox">
							<label for="on-sale">on sale</label>
						</div>
						<div class="filter-group">
							<input id="other" type="checkbox">
							<label for="other">other</label>
						</div>
					</div>
				</div>
				<div class="price">
					<p class="filter-title">{{getTranslatedContent('overview-filter-price')}}</p>
					<div class="price-slider">
						<div class="sliders-range noUi-extended" data-inputid="range"></div>
					</div>
					<div class="price-groups">
						<div class="price-group">
							<label>
								<input type="number" id="range-min" min="0" max="498">
							</label>
						</div>
						<div class="price-group">
							<label>
								<input type="number" id="range-max" min="1" max="499">
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="products-overview">
			<div class="top">
				<div class="dropdown" tabindex="1">
					<input class="dropdown-select" name="sorted" type="radio" id="relevance" checked>
					<label for="relevance" class="option">{{getTranslatedContent('overview-sort-relevance')}}</label>
					<input class="dropdown-select" name="sorted" type="radio" id="price_lth">
					<label for="price_lth" class="option">{{getTranslatedContent('overview-sort-price-lth')}}</label>
					<input class="dropdown-select" name="sorted" type="radio" id="price_htl">
					<label for="price_htl" class="option">{{getTranslatedContent('overview-sort-price-htl')}}</label>
					<input class="dropdown-select" name="sorted" type="radio" id="oldest">
					<label for="oldest" class="option">{{getTranslatedContent('overview-sort-oldest')}}</label>
					<input class="dropdown-select" name="sorted" type="radio" id="latest">
					<label for="latest" class="option">{{getTranslatedContent('overview-sort-latest')}}</label>
				</div>
				<span class="counter">{{$category->name}} {{getTranslatedContent('items')}}: <span
							class="bold">{{$counting["filtered"]}} {{getTranslatedContent('item-x-of')}} {{$counting["total"]}}</span></span>
			</div>
			<div class="products">
				@forelse($productList as $product)
					<a href="{{localizedUrl('detail', ["category" => $category->slug, "product" => $product->slug])}}">
						<article
								class="product-item{{$loop->iteration == 3 ? " hot-product" : count($product->getMedia()) > 1 ? " multiple" : "" }}">
							<div class="product-image">
								@if(count($product->colors) > 0)
									<div class="colors">
										@foreach($product->colors as $color)
											<span style="background-color:{{$color}}" class="product-color"></span>
										@endforeach
									</div>
								@endif
								<div class="overlay {{$product->category->css}}-bg">
									<div class="vertical-align">
										<i class="icon icon-info"></i>
										<span>{{getTranslatedContent('view-details')}}</span>
									</div>
								</div>
								@if($product->getMedia()->first() != NULL)
									<img src="{{$product->getMedia()->first()->getUrl()}}"
										 alt="{{$product->name}} {{$product->category->name}} Kowloon">
								@else
									<img src="/images/products/dogs/dog-cooling-mat.jpg"
										 alt="Dog product laying on cooling mat Kowloon">
								@endif
							</div>
							<div class="product-description">
								<span class="product-item-title">{{ $product->name }}</span>
								@if($loop->iteration == 3)
									<span class="product-item-description">{{$product->description}}</span>
								@endif
								<span class="product-item-price">&euro; {{$product->price}}</span>
								@if($loop->iteration == 3)
									<a href="#" class="button-hot-product">{{getTranslatedContent('button-teaser')}}</a>
								@endif
							</div>
						</article>
					</a>
				@empty
					<p>{{getTranslatedContent('product-no-products')}}</p>
				@endforelse
			</div>
		</div>
	</div>
@endsection