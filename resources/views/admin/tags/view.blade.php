@extends('admin.app')

@section('content')
	<h1 class="title-with-heart">Kowloon</h1>
	<div class="inner-content admin">
		<section>
			<h2>Your tags</h2>
			<a href="{{route('admin-tag-create')}}"><i class="fa fa-plus-circle link-in-icon"></i>Create a new tag</a>
			<div class="tags">
				@forelse($tags as $tag)
					<div class="tag">
						<a href="{{route('admin-tag-edit', $tag->slug)}}"><i class="fa fa-edit"></i> Edit</a>
						<a href="{{route('admin-tag-delete', $tag->slug)}}"><i class="fa fa-times"></i> Delete</a>
						@foreach(getSupportedLocales() as $locale => $properties)
							<?php $translation = $tag->translate( $locale ); ?>
							<p>{{$translation->name}}</p>
						@endforeach
					</div>
				@empty
					<p>Crap no tags yet...</p>
				@endforelse
			</div>
		</section>
	</div>
@endsection