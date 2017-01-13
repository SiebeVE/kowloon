@extends('admin.app')

@section('content')
	<h1 class="title-with-heart">Kowloon</h1>
	<div class="inner-content admin">
		<section>
			<h2>Your products</h2>
			<a href="{{route('admin-product-create')}}"><i class="fa fa-plus-circle link-in-icon"></i>Create a new
				product</a>
			<div class="categories">
				@forelse($productsGr as $category_id => $products)
					<h3><i class="icon icon-{{$products[0]->category->css}}"></i>{{$products[0]->category->name}}</h3>
					<div class="products">
						@foreach($products as $product)
							<article class="product-item">
								<div class="product-image">
									<div class="colors">
										@foreach($product->colors as $color)
											<span style="background-color: {{$color}};" class="product-color"></span>
										@endforeach
									</div>
									@if($product->getMedia()->first() != NULL)
										<img src="{{$product->getMedia()->first()->getUrl()}}">
									@else
										<img src="/images/products/dogs/dog-cooling-mat.jpg">
									@endif
								</div>
								<div class="product-description">
									<span class="product-item-title">{{ $product->name }}</span>
									<span class="product-item-price"><a href="{{route('admin-product-edit', $product->slug)}}"><i class="fa fa-edit"></i>
									Edit</a>
								<a href="{{route('admin-product-delete', $product->slug)}}"><i class="fa fa-times"></i>
									Delete</a></span>
								</div>
							</article>
						@endforeach
					</div>
				@empty
					<p>Crap no products yet...</p>
				@endforelse
			</div>
		</section>
	</div>
@endsection