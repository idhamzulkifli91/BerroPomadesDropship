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

	@inject('setting','App\Setting')
	@inject('discount','App\UserDiscount')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-default">
				<div class="box-header with-border">
					<div class="box-title">{{ $title }}</div>
				</div>

				<div class="box-body">

					{!! Form::open(['url' => route('web.product.shop.confirm')]) !!}

					<div class="row col-md-8">

						<div class="form-group">
							<p style="color: #ccc"> Customer</p>
							{!! Form::text('customer_name',old('customer_name'),['class' => 'form-control','placeholder' => 'Customer name']) !!}
						</div>
					</div>

					<div class="row col-md-8">

						<div class="form-group">
							<p style="color: #ccc"> Contact</p>
							{!! Form::text('customer_contact',old('customer_contact'),['class' => 'form-control','placeholder' => 'Customer Contact']) !!}
						</div>
					</div>

					<div class="row col-md-8">
						<div class="form-group">
							<p style="color: #ccc"> Address</p>
							{!! Form::text('customer_address',old('customer_address'),['class' => 'form-control','placeholder' => 'Customer Address']) !!}
						</div>
					</div>
					<div class="row col-md-8">
						<div class="form-group">
							<p style="color: #ccc"> Address</p>
							{!! Form::text('customer_email',old('customer_email'),['class' => 'form-control','placeholder' => 'Customer Email']) !!}
						</div>
					</div>

					<table class="table table-hover">
						<tr>
							<th width="40%">Product</th>
							<th>Quantity</th>
							<th>Price / Unit</th>
							<th>Total</th>
							<th>Manage</th>
						</tr>

						@foreach($items as $item)

							@php $priceDeduction = $discount->afterDiscount($item->product->id,auth()->user()->role_id) @endphp
							@php $actualPrice = $item->product->price - $priceDeduction @endphp
							<tr>
								<td>{{ $item->product->product_name }}</td>
								<td>
									<input type="hidden" id="order_id" value="{{ $item->id }}" class="form-control" name="order_id[]" />
									<input type="number" id="{{ $item->id }}" value="{{ $item->quantity }}" class="form-control" onchange="priceAdjustment(event)" onblur="priceAdjustment(event)" name="quantity[]" />

								</td>
								<td><input type="number" id="per_unit-{{ $item->id }}" name="per_unit[]" value="{{ $item->product->price - $priceDeduction  }}" class="form-control" disabled /></td>
								<td><input type="number" id="total-{{ $item->id }}" name="total[]" readonly value="{{ ($item->quantity * $actualPrice) }}" class="form-control" /></td>
								<td>
									<a href="{{ route('web.product.shop.delete',$item->id) }}" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
						@endforeach
					</table>

					<input type="submit" value="Confirm Order" class="btn btn-default" />
					{!! Form::close() !!}



				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">

		function priceAdjustment(e) {

			var _identifier = e.target.id;
			var _quantity = parseFloat(e.target.value);
			var _pricePerUnit = document.getElementById('per_unit-'+_identifier);
			var _total = document.getElementById('total-'+_identifier);

			 var parsePrice = parseFloat(_pricePerUnit.value);

			var adjustment = parseFloat(parsePrice * _quantity);
			_total.setAttribute('value',adjustment.toString());

		}
	</script>
@endsection



