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
						{!! Form::open(['url' => route('web.inventory.store')]) !!}

						<div class="form-group">
							<p style="color:#ccc;">What is your product name.</p>
							<select name="product_id" id="" class="form-control">
								@foreach($products as $product)
									<option value="{{ $product->id }}"> {{ $product->product_name }}</option>
									@endforeach
							</select>

						</div>

						<div class="form-group">
							<p style="color:#ccc;">Price of your product.</p>
							{!! Form::number('stock_count',old('stock_count'),['class' => 'form-control','placeholder' => 'Stock In']) !!}
						</div>

						<div class="form-group">
							{!! Form::submit('Add Stock',['class' => 'btn btn-danger']) !!}
						</div>


						{!! Form::close() !!}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
