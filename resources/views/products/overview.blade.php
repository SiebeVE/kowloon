@extends('layouts.app')

@section('content')
	@include('partials.carousel')
	<h1 class="title-with-heart">Kowloon</h1>
	<div class="inner-content overview">
		<div class="tags">
			<div class="tag category dog">
				Dogs
			</div>
		</div>
		<h1 class="bold size-1">Dog articles.</h1>
		<div class="filter opened">
			<p class="title choplin" id="filter-toggle">Filter</p>
			<div class="filter-content">
				<div class="by-collection">
					<p class="filter-title">By collection</p>
					<div class="filter-groups">
						<div class="filter-group">
							<input id="splash-n-fun" type="checkbox">
							<label for="splash-n-fun">Spash 'n Fun</label>
						</div>
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
					<p class="filter-title">Price range</p>
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
					<label for="relevance" class="option">Sort by relevance</label>
					<input class="dropdown-select" name="sorted" type="radio" id="price_lth">
					<label for="price_lth" class="option">Price: low to high</label>
					<input class="dropdown-select" name="sorted" type="radio" id="price_htl">
					<label for="price_htl" class="option">Price: high to low</label>
					<input class="dropdown-select" name="sorted" type="radio" id="oldest">
					<label for="oldest" class="option">Oldest</label>
					<input class="dropdown-select" name="sorted" type="radio" id="latest">
					<label for="latest" class="option">Latest</label>
				</div>
				<span class="counter">Dog items: <span class="bold">5 of 56</span></span>
			</div>
			<div class="products">
				<article class="product-item">
					<a href="dog/cooling-mat">
						<div class="product-image">
							<div class="colors">
								<span style="background-color:#FFFFFF" class="product-color"></span>
								<span style="background-color:#000000" class="product-color"></span>
								<span style="background-color:#2d4aac" class="product-color"></span>
							</div>
							<div class="overlay dog-bg">
								<div class="vertical-align">
									<i class="icon icon-info"></i>
									<span>view details</span>
								</div>
							</div>
							<img src="/images/products/dogs/dog-cooling-mat.jpg">
						</div>
						<div class="product-description">
							<span class="product-item-title">Cooling mat</span>
							<span class="product-item-price">&euro; 15,49</span>
						</div>
					</a>
				</article>
				<article class="product-item">
					<div class="product-image">
						<div class="overlay dog-bg">
							<div class="vertical-align">
								<i class="icon icon-info"></i>
								<span>view details</span>
							</div>
						</div>
						<img src="/images/products/dogs/dog-cooling-mat.jpg">
					</div>
					<div class="product-description">
						<span class="product-item-title">Cooling mat</span>
						<span class="product-item-price">&euro; 15,49</span>
					</div>
				</article>
				<article class="product-item hot-product">
					<div class="product-image">
						<div class="colors">
							<span style="background-color:#FFFFFF" class="product-color"></span>
							<span style="background-color:#000000" class="product-color"></span>
							<span style="background-color:#2d4aac" class="product-color"></span>
						</div>
						<div class="overlay dog-bg">
							<div class="vertical-align">
								<i class="icon icon-info"></i>
								<span>view details</span>
							</div>
						</div>
						<img src="/images/products/dogs/dog-cooling-mat.jpg">
					</div>
					<div class="product-description">
						<span class="product-item-title">Cooling mat</span>
						<span class="product-item-description">Hier komt een deel van de beschrijvende tekst die bij elk product hoort. Ook terug te vinden in het product detail.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius....</span>
						<span class="product-item-price">&euro; 15,49</span>
						<a href="#" class="button-hot-product">Want to know more?</a>
					</div>
				</article>
				<article class="product-item">
					<div class="product-image">
						<div class="overlay dog-bg">
							<div class="vertical-align">
								<i class="icon icon-info"></i>
								<span>view details</span>
							</div>
						</div>
						<img src="/images/products/dogs/dog-cooling-mat.jpg">
					</div>
					<div class="product-description">
						<span class="product-item-title">Cooling mat</span>
						<span class="product-item-price">&euro; 15,49</span>
					</div>
				</article>
				<article class="product-item multiple">
					<div class="product-image">
						<div class="overlay dog-bg">
							<div class="vertical-align">
								<i class="icon icon-info"></i>
								<span>view details</span>
							</div>
						</div>
						<img src="/images/products/dogs/dog-cooling-mat.jpg">
					</div>
					<div class="product-description">
						<span class="product-item-title">Cooling mat</span>
						<span class="product-item-price">&euro; 15,49</span>
					</div>
				</article>
				<article class="product-item multiple">
					<div class="product-image">
						<div class="overlay dog-bg">
							<div class="vertical-align">
								<i class="icon icon-info"></i>
								<span>view details</span>
							</div>
						</div>
						<img src="/images/products/dogs/dog-cooling-mat.jpg">
					</div>
					<div class="product-description">
						<span class="product-item-title">Cooling mat</span>
						<span class="product-item-price">&euro; 15,49</span>
					</div>
				</article>
				<article class="product-item">
					<div class="product-image">
						<div class="overlay dog-bg">
							<div class="vertical-align">
								<i class="icon icon-info"></i>
								<span>view details</span>
							</div>
						</div>
						<img src="/images/products/dogs/dog-cooling-mat.jpg">
					</div>
					<div class="product-description">
						<span class="product-item-title">Cooling mat</span>
						<span class="product-item-price">&euro; 15,49</span>
					</div>
				</article>
				<article class="product-item multiple">
					<div class="product-image">
						<div class="overlay dog-bg">
							<div class="vertical-align">
								<i class="icon icon-info"></i>
								<span>view details</span>
							</div>
						</div>
						<img src="/images/products/dogs/dog-cooling-mat.jpg">
					</div>
					<div class="product-description">
						<span class="product-item-title">Cooling mat</span>
						<span class="product-item-price">&euro; 15,49</span>
					</div>
				</article>
				<article class="product-item">
					<div class="product-image">
						<div class="overlay dog-bg">
							<div class="vertical-align">
								<i class="icon icon-info"></i>
								<span>view details</span>
							</div>
						</div>
						<img src="/images/products/dogs/dog-cooling-mat.jpg">
					</div>
					<div class="product-description">
						<span class="product-item-title">Cooling mat</span>
						<span class="product-item-price">&euro; 15,49</span>
					</div>
				</article>
			</div>
		</div>
	</div>
@endsection