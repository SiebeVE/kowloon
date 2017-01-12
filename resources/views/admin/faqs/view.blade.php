@extends('admin.app')

@section('content')
	<h1 class="title-with-heart">Kowloon</h1>
	<div class="inner-content admin">
		<section>
			<h2>Your faqs</h2>
			<a href="{{route('admin-faq-create')}}"><i class="fa fa-plus-circle link-in-icon"></i>Create a new faq</a>
			<section class="faqs">
				@forelse($faqs as $faq)
					<article class="faq">
						<a href="{{route('admin-faq-edit', $faq->slug)}}"><i class="fa fa-edit"></i> Edit</a>
						<a href="{{route('admin-faq-delete', $faq->slug)}}"><i class="fa fa-times"></i> Delete</a>
						@foreach(getSupportedLocales() as $locale => $properties)
							<?php $translation = $faq->translate( $locale ); ?>
							<h3 class="faq-title">{{$translation->question}}</h3>
							<p>{{$translation->answer}}</p>
						@endforeach
					</article>
				@empty
					<p>Crap no faqs yet...</p>
				@endforelse
			</section>
		</section>
	</div>
@endsection