@extends('admin.app')

@section('content')
	<h1 class="title-with-heart">Kowloon</h1>
	<div class="inner-content admin dashboard">
		<section>
			<h2>Admin zone</h2>
			<article>
				<h3>Tags</h3>
				<a href="{{route('admin-tag-create')}}"><i class="fa fa-plus-circle"></i>Create a new tag</a>
{{--				<a href="{{route('admin-tag-view')}}"><i class="fa fa-eye"></i>View current tags()</a>--}}
			</article>
			<article>
				<h3>FAQ</h3>
				{{--<a href="{{route('admin-faq-create')}}"><i class="fa fa-plus-circle"></i>Create a new FAQ</a>--}}
				{{--<a href="{{route('admin-faq-view')}}"><i class="fa fa-eye"></i>View current faqs()</a>--}}
			</article>
			<article>
				<h3>Products</h3>
				{{--<a href="{{route('admin-product-create')}}"><i class="fa fa-plus-circle"></i>Create a new product</a>--}}
				{{--<a href="{{route('admin-product-view')}}"><i class="fa fa-eye"></i>View current products()</a>--}}
			</article>
		</section>
	</div>
@endsection