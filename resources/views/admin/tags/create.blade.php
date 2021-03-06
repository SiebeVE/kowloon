<?php
use Stichoza\GoogleTranslate\TranslateClient;
$tr = new TranslateClient();
?>
@extends('admin.app')

@section('content')
	<h1 class="title-with-heart">Kowloon</h1>
	<div class="inner-content admin">
		<section>
			<h2>{{isset($tag) ? "Edit" : "Create"}} tag</h2>
			<a href="{{route('admin-tag-view')}}"><i class="fa fa-eye link-in-icon"></i>View all current tags</a>
			<form class="locale" role="form" method="post"
				  action="{{isset($tag) ? route('admin-tag-edit', $tag->slug) : route('admin-tag-create')}}">
				{{csrf_field()}}
				<div class="localized">
					@foreach(getSupportedLocales() as $localeCode => $properties)
						<?php
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
										   value="{{ $errors->has('name-'.$localeCode) ? old('name-'.$localeCode) : (isset($tag) ? $tag->{'name:'.$localeCode} : '') }}"
										   required>
									
									@if ($errors->has('name-'.$localeCode))
										<span class="help-block">
                                        <strong>{{ $errors->first('name-'.$localeCode) }}</strong>
                                    </span>
									@endif
								</div>
							</div>
						</div>
					@endforeach
				</div>
				<button type="submit" class="submit">{{isset($tag) ? "Edit" : "Add"}} tag</button>
			</form>
		</section>
	</div>
@endsection