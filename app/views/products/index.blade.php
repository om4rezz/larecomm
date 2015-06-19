@extends('layouts.main')

@section('content')

	<div id="admin">
		<h1>Products Admin Panel</h1><hr>

		<p>Here you can view, delete, and create new products.</p>
		
		<h2>Products:</h2><hr>

		<ul>
			@foreach($products as $product)
				<li>
					{{ HTML::image($product->image, $product->title, array('width'=>'50')) }}
					{{ $product->title }} - 
					{{ Form::open(array('url' => 'admin/products/destroy', 'class' => 'form-inline')) }}
					{{ Form::hidden('id', $product->id) }}
					{{ Form::submit('delete') }}
					{{ Form::close() }} -

					{{ Form::open('url' => 'admin/products/toggle-availability', 'class'=>'form-inline') }}
					{{ Form::hidden('id', $product->id) }}
					{{ Form::select('availability', array('1' => 'In Stock', '0' => 'Out of Stock'), $product->availability) }}
					{{ Form::submit('Update') }}
					{{ From::close() }}
				</li>
			@endforeach
		</ul>

		<h2>Create New Product</h2><hr>

		@if($errors->has())
			<div id="form-errors">
				<p>The following errors have occurred:</p>

				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div><!-- end form errors -->
		@endif

		{{ Form::open(array('url' => 'admin/products/create')) }}
		<p>
			{{ Form::label('title') }}
			{{ Form::text('title') }}
		</p>
		{{ Form::submit('Create Product', array('class' => 'secondary-cart-btn')) }}
		{{ Form::close() }}
	</div><!-- end admin -->

	
@stop