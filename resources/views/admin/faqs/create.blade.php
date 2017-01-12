<?php
use Stichoza\GoogleTranslate\TranslateClient;
$tr = new TranslateClient();
?>
@extends('admin.app')

@section('content')
	<h1 class="title-with-heart">Kowloon</h1>
	<div class="inner-content admin">
		<section class="faqs">
			<h2>{{isset($faq) ? "Edit" : "Create"}} faq</h2>
			<a href="{{route('admin-faq-view')}}"><i class="fa fa-eye link-in-icon"></i>View all current faqs</a>
			<form class="locale" role="form" method="post"
				  action="{{isset($faq) ? route('admin-faq-edit', $faq->slug) : route('admin-faq-create')}}">
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
									<input id="question-{{$localeCode}}" type="text" class="form-control"
										   name="question-{{$localeCode}}"
										   value="{{ $errors->has('question-'.$localeCode) ? old('question-'.$localeCode) : (isset($faq) ? $faq->{'question:'.$localeCode} : '') }}"
										   required>
									
									@if ($errors->has('question-'.$localeCode))
										<span class="help-block">
                                        <strong>{{ $errors->first('question-'.$localeCode) }}</strong>
                                    </span>
									@endif
								</div>
							</div>
							<div class="form-group{{ $errors->has('answer-'.$localeCode) ? ' has-error' : '' }}">
								<label for="answer-{{$localeCode}}">{{$tr->translate('Answer')}}</label>
								
								<div class="col-md-6">
									<textarea id="answer-{{$localeCode}}" class="form-control"
											  name="answer-{{$localeCode}}"
											  required>{{ $errors->has('answer-'.$localeCode) ? old('answer-'.$localeCode) : (isset($faq) ? $faq->{'answer:'.$localeCode} : '') }}</textarea>
									
									@if ($errors->has('answer-'.$localeCode))
										<span class="help-block">
                                        <strong>{{ $errors->first('answer-'.$localeCode) }}</strong>
                                    </span>
									@endif
								</div>
							</div>
						</div>
					@endforeach
				</div>
				<button type="submit" class="submit">{{isset($faq) ? "Edit" : "Add"}} faq</button>
			</form>
		</section>
	</div>
@endsection