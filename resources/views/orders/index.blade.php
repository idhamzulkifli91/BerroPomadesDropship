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
					<a href="{{ route('web.inventory.create') }}" class="btn pull-right btn-primary"><i class="fa fa-plus"> </i> Create</a>
				</div>

				<div class="box-body">

					<table class="table table-bordered table-hover">
						<tr>
							<th>No</th>
							<th>Total</th>
							<th>Status</th>
							<th>Payment Status</th>
							<th>Order Date</th>
							<th>Manage</th>
						</tr>

						@if($orders->count())
							@foreach($orders as $order)

								<tr>
									<td>{{ $counter++ }}</td>
									<td>{{ $order->total }}</td>
									<td><label class="label label-info">{{ $order->orderStatus->name }}</label></td>
									<td><label class="label label-info">{{ $order->paymentStatus->name }}</label></td>
									<td>{{ $order->created_at }}</td>
									<td>
										<!-- Split button -->
										<div class="btn-group">
											<button type="button" class="btn btn-danger">Action</button>
											<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="caret"></span>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul class="dropdown-menu">
												<li><a href="{{ route('web.user_order.show',$order->id) }}"> Details</a></li>
												<li><a href="{{ route('web.inventory.delete',$order->id) }}"> Invoice</a></li>
											</ul>
										</div>
									</td>
								</tr>

							@endforeach
						@endif

					</table>
					{!! $orders->render() !!}

				</div>
			</div>
		</div>
	</div>
@endsection
