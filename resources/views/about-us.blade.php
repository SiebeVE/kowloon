@extends('layouts.app')

@section('content')
	<div class="header">
		<img src="/images/headers/about-us.jpg" alt="Laughing brunette girl with white dog">
	</div>
	<span class="title-with-heart">Kowloon</span>
	<div class="inner-content about-us">
		<div class="tags">
			<div class="tag">
				{{strtolower(getTranslatedContent('about-us-title'))}}
			</div>
		</div>
		<h1 class="bold size-1">{{getTranslatedContent('about-us-title')}}</h1>
		<section class="info-contact">
			<article class="info">
				<h2 class="bold size-3">Kowloon</h2>
				<p>{{getTranslatedContent('about-us-first-read')}}</p>
				<p>{{getTranslatedContent('about-us-second-read')}}</p>
			</article>
			<article class="contact">
				<h2 class="bold size-3">{{getTranslatedContent('about-us-contact')}}</h2>
				<ul>
					<li>Deckx Johan</li>
					<li>Bosdreef 7</li>
					<li>2200 Herentals</li>
				</ul>
			</article>
		</section>
		<section>
			<h2 class="bold size-3">{{getTranslatedContent('about-us-form-title')}}</h2>
			<form method="post">
				{{csrf_field()}}
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email">E-mail</label>
					<input type="email" id="email" name="email" required
						   placeholder="{{getTranslatedContent('banner-email')}}"
						   value="{{$errors->has('email') ? old('email') : ""}}">
					@if ($errors->has('email'))
						<p class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</p>
					@endif
				</div>
				<div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
					<label for="message">{{getTranslatedContent('about-us-message-title')}}</label>
					<textarea id="message" name="message"
							  placeholder="{{getTranslatedContent('about-us-message-placeholder')}}"
							  required>{{$errors->has('message') ? old('message') : ""}}</textarea>
					@if ($errors->has('message'))
						<p class="help-block">
							<strong>{{ $errors->first('message') }}</strong>
						</p>
					@endif
				</div>
				<button type="submit" class="submit">{{getTranslatedContent('about-us-submit-button')}}</button>
			</form>
		</section>
		<section class="faqs">
			<h2 class="bold size-3">{{getTranslatedContent('faq-title')}}</h2>
			@foreach($faqs as $faq)
				<article class="faq">
					<h3 class="faq-title">{{$faq->question}}</h3>
					<p>{{$faq->answer}}</p>
				</article>
			@endforeach
		</section>
	</div>
@endsection