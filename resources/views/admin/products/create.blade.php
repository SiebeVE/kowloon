<?php
use Stichoza\GoogleTranslate\TranslateClient;
$tr = new TranslateClient();
?>
@extends('admin.app')

@section('content')
	<h1 class="title-with-heart">Kowloon</h1>
	<div class="inner-content admin">
		<section>
			<h2>{{isset($product) ? "Edit" : "Create"}} product</h2>
			<a href="{{route('admin-product-view')}}"><i class="fa fa-eye link-in-icon"></i>View all current
				products</a>
			<form id="admin-product-create" class="locale" role="form" method="post"
				  enctype="multipart/form-data"
				  action="{{isset($product) ? route('admin-product-edit', $product->slug) : route('admin-product-create')}}">
				{{csrf_field()}}
				<div class="categories">
					<h3 class="{{ $errors->has('category') ? 'has-error' : '' }}">Link category</h3>
					<div class="categories-pick">
						@foreach($categories as $category)
							<input type="radio" value="{{$category->id}}" class="margin-right"
								   name="category"
								   id="category-{{$category->css}}" {{ isset($product) ? ($product->category_id == $category->id ? "checked" : "") : ($errors->has('category') ? (old(category) == $category->id ? "checked" : "") : "") }}>
							<label for="category-{{$category->css}}" class="color-{{$category->css}}"><i
										class="icon icon-{{$category->css}} margin-right"></i><span>{{ $category->{'name:en'} }}</span>
							</label>
						@endforeach
						@if($errors->has('category'))
							<span class="help-block">
								<strong>{{ $errors->first('category') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="tags-picker">
					<h3>Link tags</h3>
					<div class="tag-picker picker">
						@foreach($tags as $tag)
							<label><input type="checkbox" value="{{$tag->id}}" class="margin-right"
										  {{ isset($product) ? ( in_array( $tag->id, $product->tag_ids ) ? "checked" : "") : "" }}
										  name="tags[]">{{ $tag->{'name:en'} }}</label>
						@endforeach
					</div>
				</div>
				<div class="faqs-picker">
					<h3>Link faqs</h3>
					<div class="faq-picker picker">
						@foreach($faqs as $faq)
							<label><input type="checkbox" value="{{$faq->id}}" class="margin-right"
										  {{ isset($product) ? (in_array( $faq->id, $product->faq_ids ) ? "checked" : "") : "" }}
										  name="faqs[]">{{$faq->{'question:en'} }}</label>
						@endforeach
					</div>
				</div>
				<div class="images">
					<h3>{{isset($product) ? "Edit" : "Add"}} pictures</h3>
					<div class="examples-images">
						@if(isset($product))
							{{--{{dd($images)}}--}}
							@foreach($product->getMedia() as $image)
								<img src="{{ $image->getUrl() }}">
							@endforeach
						@endif
					</div>
					<input type="file" accept="image/*" id="images" name="images[]"
						   data-multiple-caption="{count} files selected"
						   multiple/>
					<label for="images" class="submit"><span>Choose pictures</span></label>
				</div>
				<div class="price-input">
					<h3>{{isset($product) ? "Edit" : "Add"}} price</h3>
					<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
						<div class="col-md-6">
							<label><input id="price" type="number" class="form-control"
										  name="price" min="0" step="any"
										  value="{{ $errors->has('price') ? old('price') : (isset($product) ? str_replace(',', '.', $product->price) : '') }}"
										  required></label>
							
							@if($errors->has('price'))
								<span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
							@endif
						</div>
					</div>
				</div>
				<div class="colors">
					<h3>{{isset($product) ? "Edit" : "Add"}} colors</h3>
					<div id="colors">
						@if(isset($product))
							@foreach($product->colors as $color)
								<div class="color-input">
									<input type="text" name="colors[]" class="color" placeholder="#FFFFFF"
										   value="{{$color}}">
								</div>
							@endforeach
						@endif
					</div>
					<button type="button" class="add" data-append-id="colors" data-template-id="color-template">Add
						color
					</button>
					<button type="button" class="remove" data-append-id="colors">Remove color</button>
					<div class="hidden" id="color-template">
						<div class="color-input">
							<input disabled type="text" name="colors[]" class="color" placeholder="#FFFFFF">
						</div>
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
									<input id="name-{{$localeCode}}" type="text" class="form-control"
										   name="name-{{$localeCode}}"
										   value="{{ $errors->has('name-'.$localeCode) ? old('name-'.$localeCode) : (isset($product) ? $product->{'name:'.$localeCode} : '') }}"
										   required>
									
									@if ($errors->has('name-'.$localeCode))
										<span class="help-block">
                                        <strong>{{ $errors->first('name-'.$localeCode) }}</strong>
                                    </span>
									@endif
								</div>
							</div>
							<div class="form-group{{ $errors->has('description-'.$localeCode) ? ' has-error' : '' }}">
								<label for="description-{{$localeCode}}">{{$tr->translate('Description')}}</label>
								
								<div class="col-md-6">
									<textarea id="description-{{$localeCode}}" class="form-control"
											  name="description-{{$localeCode}}"
											  required>{{ $errors->has('description-'.$localeCode) ? old('description-'.$localeCode) : (isset($product) ? $product->{'description:'.$localeCode} : '') }}</textarea>
									
									@if ($errors->has('description-'.$localeCode))
										<span class="help-block">
                                        <strong>{{ $errors->first('description-'.$localeCode) }}</strong>
                                    </span>
									@endif
								</div>
							</div>
						</div>
					@endforeach
				</div>
				<button type="submit" class="submit">{{isset($product) ? "Edit" : "Add"}} product</button>
			</form>
		</section>
	</div>
@endsection