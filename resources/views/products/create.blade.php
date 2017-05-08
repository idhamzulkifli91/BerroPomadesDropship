@extends('backpack::layout')

@section('header')
	<section class="content-header">
		<div class="row-fluid">
			<ul class="breadcrumb">
				<li>Discount</li>
				<li>Create</li>
			</ul>
		</div>
	</section>
@endsection



@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-default">
				<div class="box-header with-border">
					<div class="box-title">{{ $title }}</div>
				</div>

				<div class="box-body">

					<div class="col-md-8">
						{!! Form::open(['url' => route('products.store'),'files' => true]) !!}

						<div class="form-group">
							<p style="color:#ccc;">What is your product name.</p>
							{!! Form::text('product_name',old('product_name'),['class' => 'form-control','placeholder' => 'Product Name']) !!}

						</div>

						<div class="form-group">
							<p style="color:#ccc;">Price of your product.</p>
							{!! Form::text('price',old('price'),['class' => 'form-control','placeholder' => 'Product Price']) !!}
						</div>

						<div class="form-group">
							<p style="color:#ccc;">Describe to other about your products and item.</p>
							{!! Form::textarea('description',old('product_name'),['class' => 'form-control','placeholder' => 'Product Description']) !!}
						</div>


						<div class="form-group">
							<p style="color:#ccc;">Set product image.</p>
							{!! Form::file('file',['class' => 'form-control']) !!}
						</div>

						<div class="form-group">
							{!! Form::submit('Create',['class' => 'btn btn-danger']) !!}
						</div>

						{!! Form::close() !!}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
