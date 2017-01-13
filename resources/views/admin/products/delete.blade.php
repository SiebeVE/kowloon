<?php
use Stichoza\GoogleTranslate\TranslateClient;
$tr = new TranslateClient();
?>
@extends('admin.app')

@section('content')
	<h1 class="title-with-heart">Kowloon</h1>
	<div class="inner-content admin">
		<section>
			<h2>Are you sure you want to delete this product?</h2>
			<a href="{{route('admin-product-view')}}"><i class="fa fa-eye link-in-icon"></i>View all current
				products</a>
			<form id="admin-product-delete" class="locale" role="form" method="post"
				  enctype="multipart/form-data"
				  action="{{ route('admin-product-delete', $product->slug) }}">
				{{csrf_field()}}
				<div class="categories">
					<h3>Linked category</h3>
					<div class="categories-pick">
						@foreach($categories as $category)
							<input type="radio" value="{{$category->id}}" class="margin-right"
								   name="category" disabled
								   id="category-{{$category->css}}" {{$product->category_id == $category->id ? "checked" : "" }}>
							<label for="category-{{$category->css}}" class="color-{{$category->css}}"><i
										class="icon icon-{{$category->css}} margin-right"></i><span>{{ $category->{'name:en'} }}</span>
							</label>
						@endforeach
					</div>
				</div>
				<div class="tags-picker">
					<h3>Linked tags</h3>
					<div class="tag-picker picker">
						@foreach($tags as $tag)
							<label><input type="checkbox" value="{{$tag->id}}" class="margin-right" disabled
										  {{ in_array( $tag->id, $product->tag_ids ) ? "checked" : "" }}
										  name="tags[]">{{ $tag->{'name:en'} }}</label>
						@endforeach
					</div>
				</div>
				<div class="faqs-picker">
					<h3>Linked faqs</h3>
					<div class="faq-picker picker">
						@foreach($faqs as $faq)
							<label><input type="checkbox" value="{{$faq->id}}" class="margin-right" disabled
										  {{ in_array( $faq->id, $product->faq_ids ) ? "checked" : "" }}
										  name="faqs[]">{{$faq->{'question:en'} }}</label>
						@endforeach
					</div>
				</div>
				<div class="images">
					<h3>Pictures</h3>
					<div class="examples-images">
						{{--{{dd($images)}}--}}
						@foreach($product->getMedia() as $image)
							<img src="{{ $image->getUrl() }}">
						@endforeach
					</div>
				</div>
				<div class="price-input">
					<h3>Price</h3>
					<div class="form-group">
						<div class="col-md-6">
							<p>&euro; {{$product->price}}</p>
						</div>
					</div>
				</div>
				<div class="colors">
					<h3>Colors</h3>
					<div id="colors">
						@foreach($product->colors as $color)
							<span style="background-color: {{$color}};" class="product-color"></span>
						@endforeach
					</div>
				</div>
				<div class="localized">
					@foreach(getSupportedLocales() as $localeCode => $properties)
						<?php
						$tr->setSource( "en" );
						$tr->setTarget( $localeCode );
						?>
						<div class="localized-row">
							<h3>
								<i class="flag-icon flag-icon-{{getCountry( $properties["regional"])}}"></i>
								{{ $properties['native'] }}
							</h3>
							<div class="form-group{{ $errors->has('name-'.$localeCode) ? ' has-error' : '' }}">
								<label for="name-{{$localeCode}}">{{$tr->translate('Name')}}</label>
								
								<div class="col-md-6">
									<p>{{$product->{'name:'.$localeCode} }}</p>
								</div>
							</div>
							<div class="form-group{{ $errors->has('description-'.$localeCode) ? ' has-error' : '' }}">
								<label for="description-{{$localeCode}}">{{$tr->translate('Description')}}</label>
								
								<div class="col-md-6">
									<p>{{$product->{'description:'.$localeCode} }}</p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
				<button type="submit" class="submit">Delete product</button>
			</form>
		</section>
	</div>
@endsection