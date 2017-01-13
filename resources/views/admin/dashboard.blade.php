@extends('admin.app')

@section('content')
	<h1 class="title-with-heart">Kowloon</h1>
	<div class="inner-content admin dashboard">
		<section>
			<h2>Admin zone</h2>
			<article>
				<h3>Hot items</h3>
				@if($hasHot >= 4)
					<form method="post">
						{{csrf_field()}}
						<div class="hot-items">
							@for($curHotItem = 1; $curHotItem<= 4; $curHotItem++)
								<label class="{{ $errors->has('hot_item.'.$curHotItem) ? 'has-error' : '' }}">
									<span>Hot Item {{ $curHotItem }}</span>
									<select name="hot_item[{{$curHotItem}}]">
										@foreach($productsCat as $group_id => $products)
											<optgroup label="{{ $products[0]->category->name }}">
												@foreach($products as $product)
													<option value="{{$product->id}}" {{ $errors->has('hot_item.'.$curHotItem) ? old('hot_item.'.$curHotItem) : $product->hot_item == $curHotItem ? "selected" : ""}}>{{$product->name}}</option>
												@endforeach
											</optgroup>
										@endforeach
									</select>
									@if ($errors->has('hot_item.'.$curHotItem))
										<span class="help-block">
                                        <strong>{{ $errors->first('hot_item.'.$curHotItem) }}</strong>
                                    </span>
									@endif
								</label>
							@endfor
						</div>
						<button type="submit" class="submit">Change hot items</button>
					</form>
					@else
					<p>You first have to at least create 4 products before you can add hot items.</p>
				@endif
			</article>
			<article>
				<h3>Tags</h3>
				<a href="{{route('admin-tag-create')}}"><i class="fa fa-plus-circle"></i>Create a new tag</a>
				<a href="{{route('admin-tag-view')}}"><i class="fa fa-eye"></i>View current tags ({{$tag}})</a>
			</article>
			<article>
				<h3>FAQ</h3>
				<a href="{{route('admin-faq-create')}}"><i class="fa fa-plus-circle"></i>Create a new FAQ</a>
				<a href="{{route('admin-faq-view')}}"><i class="fa fa-eye"></i>View current faqs({{$faq}})</a>
			</article>
			<article>
				<h3>Products</h3>
				<a href="{{route('admin-product-create')}}"><i class="fa fa-plus-circle"></i>Create a new product</a>
				<a href="{{route('admin-product-view')}}"><i class="fa fa-eye"></i>View current
					products({{$productCount}}
					)</a>
			</article>
		</section>
	</div>
@endsection