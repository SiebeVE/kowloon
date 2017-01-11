@extends('admin.app')

@section('content')
	<h1 class="title-with-heart">Kowloon</h1>
	<div class="inner-content center admin">
		<form role="form" method="POST" action="{{ url('/admin/login') }}">
			{{ csrf_field() }}
			
			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				<label for="email">E-Mail Address</label>
				
				<div class="col-md-6">
					<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
						   autofocus>
					
					@if ($errors->has('email'))
						<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
					@endif
				</div>
			</div>
			
			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				<label for="password" class="control-label">Password</label>
				
				<div class="col-md-6">
					<input id="password" type="password" class="form-control" name="password" required>
					
					@if ($errors->has('password'))
						<span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
					@endif
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="remember"> Remember Me
						</label>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-8 col-md-offset-4">
					<button type="submit" class="submit">
						Login
					</button>
					<p>
						<a class="btn btn-link" href="{{ url('/admin/password/reset') }}">
							Forgot Your Password?
						</a>
					</p>
				</div>
			</div>
		</form>
	</div>
@endsection
