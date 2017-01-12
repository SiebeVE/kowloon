<?php
use Stichoza\GoogleTranslate\TranslateClient;
$tr = new TranslateClient();
?>
@extends('admin.app')

@section('content')
	<h1 class="title-with-heart">Kowloon</h1>
	<div class="inner-content admin">
		<section>
			<h2>Are you sure you want to delete this tag?</h2>
			<a href="{{route('admin-tag-view')}}"><i class="fa fa-eye link-in-icon"></i>View all current tags</a>
			<form class="locale" role="form" method="post"
				  action="{{route('admin-tag-delete', $tag->slug)}}">
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
									<p>{{ $tag->{'name:'.$localeCode} }}</p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
				<button type="submit" class="submit">Delete tag</button>
			</form>
		</section>
	</div>
@endsection