<?php
use Stichoza\GoogleTranslate\TranslateClient;
$tr = new TranslateClient();
?>
@extends('admin.app')

@section('content')
	<h1 class="title-with-heart">Kowloon</h1>
	<div class="inner-content admin">
		<section class="faqs">
			<h2>Are you sure you want to delete this faq?</h2>
			<a href="{{route('admin-faq-view')}}"><i class="fa fa-eye link-in-icon"></i>View all current faqs</a>
			<form class="locale" role="form" method="post"
				  action="{{route('admin-faq-delete', $faq->slug)}}">
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
							<div class="form-group{{ $errors->has('question-'.$localeCode) ? ' has-error' : '' }}">
								<label for="question-{{$localeCode}}">{{$tr->translate('Question')}}</label>
								
								<div class="col-md-6">
									<p>{{ $faq->{'question:'.$localeCode} }}</p>
								</div>
							</div>
							<div class="form-group{{ $errors->has('answer-'.$localeCode) ? ' has-error' : '' }}">
								<label for="answer-{{$localeCode}}">{{$tr->translate('Answer')}}</label>
								
								<div class="col-md-6">
									<p>{{ $faq->{'answer:'.$localeCode} }}</p>
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