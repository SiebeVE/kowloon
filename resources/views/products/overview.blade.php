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
						Here comes slider
					</div>
					<div class="price-group">
						<label>
							<input type="number" min="0" max="498">
						</label>
					</div>
					<div class="price-group">
						<label>
							<input type="number" min="1" max="499">
						</label>
					</div>
				</div>
			</div>
		</div>
		<div class="products">
			<div class="dropdown">Here comes dropdown</div>
			<span class="counter">Dog items: <span>5 of 56</span></span>
		</div>
	</div>
@endsection