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
					<div class="box-title">{{ $title  }}</div>
					<a href="{{ route('web.role_discount.create') }}" class="btn pull-right btn-primary"><i class="fa fa-plus"> </i> Create</a>
				</div>

				<div class="box-body">

					<table class="table table-bordered table-hover">
						<tr>
							<th>No</th>
							<th>Product</th>
							<th>Role</th>
							<th>Price</th>
							<th>Discount</th>
							<th>Price After</th>
							<th>Manage</th>
						</tr>

						@if($discounts->count())
							@foreach($discounts as $discount)

								<tr>
									<td>{{ $counter++ }}</td>
									<td>{{ $discount->product->product_name }}</td>
									<td>{{ $discount->role->name }}</td>
									<td>{{ $discount->product->price }}</td>
									<td>{{ $discount->discount }}</td>
									<td>@php
												$deduction = $discount->discount / 100;
												$after = $deduction * $discount->product->price;
												$price = $discount->product->price - $after;

												echo $price;
												@endphp</td>
									<td>
										<!-- Split button -->
										<div class="btn-group">
											<button type="button" class="btn btn-danger">Action</button>
											<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="caret"></span>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul class="dropdown-menu">
												<li><a href="{{ route('web.role_discount.delete',$discount->id) }}"> Delete</a></li>
											</ul>
										</div>
									</td>
								</tr>

							@endforeach
						@endif

					</table>
					{!! $discounts->render() !!}

				</div>
			</div>
		</div>
	</div>
@endsection
