@extends('admin.app')

@section('content')
	<h1 class="title-with-heart">Kowloon</h1>
	<div class="inner-content admin">
		<section>
			<h2>Create tag</h2>
			<form class="localized" role="form" method="post">
				{{csrf_field()}}
				@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
					<div class="localized-row">
						<h3>
							<i class="flag-icon flag-icon-{{getCountry( $properties["regional"])}}"></i>
							{{ $properties['native'] }}
						</h3>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email">Name</label>
							
							<div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email"
									   value="{{ old('email') }}"
									   required
									   autofocus>
								
								@if ($errors->has('email'))
									<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
								@endif
							</div>
						</div>
					</div>
				@endforeach
			</form>
		</section>
	</div>
@endsection