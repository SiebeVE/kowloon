<form method="post" action="{{route('home')}}">
	{{csrf_field()}}
	<div class="banner">
		<div class="exclusive">
			<p class="deals-first-read">{{getTranslatedContent('banner-first-read')}}</p>
			<p class="deals-second-read">{{getTranslatedContent('banner-second-read')}}</p>
		</div>
		<div class="email">
			<p class="size-3">{{getTranslatedContent('banner-cta')}}</p>
			<p class="text-helper">{{getTranslatedContent('banner-help-text')}}</p>
			<form>
				<label class="inline-button{{ $errors->has('email') ? ' has-error' : '' }}">
					<input name="email" type="email" placeholder="{{getTranslatedContent('banner-email')}}">
					<button class="inline" type="submit">Ok</button>
				</label>
				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
			</form>
		</div>
	</div>
</form>