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
			<form class="locale" role="form" method="post"
				  action="{{isset($product) ? route('admin-product-edit', $product->slug) : route('admin-product-create')}}">
				{{csrf_field()}}
				<div class="images">
					Here comes image upload
				</div>
				<div class="colors">
					Here comes color
				</div>
				<div class="tag-picker">
					Here comes tag picker
				</div>
				<div class="faq-picker">
					Here comes faq picker
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
							<div class="form-group{{ $errors->has('specifications-'.$localeCode) ? ' has-error' : '' }}">
								<label for="specifications-{{$localeCode}}">{{$localeCode == "nl" ? "Specificaties" : "Specifications"}}</label>
								
								<div class="col-md-6">
									<input id="specifications-{{$localeCode}}" type="text" class="form-control"
										   name="specifications-{{$localeCode}}"
										   value="{{ $errors->has('specifications-'.$localeCode) ? old('specifications-'.$localeCode) : (isset($product) ? $product->{'specifications:'.$localeCode} : '') }}"
										   required>
									
									@if ($errors->has('specifications-'.$localeCode))
										<span class="help-block">
                                        <strong>{{ $errors->first('specifications-'.$localeCode) }}</strong>
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