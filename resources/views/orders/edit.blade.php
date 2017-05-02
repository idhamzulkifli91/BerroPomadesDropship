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

	@inject('user','App\User')

	<div class="row">
		<div class="col-md-12">
			<div class="box box-default">
				<div class="box-header with-border">
					<a href="{{ route('web.payment.invoice',$order->id) }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Invoice</a>

					@if($user->shouldBe('admin'))
						<a href="{{ route('web.user_order.approve',$order->id) }}" class="btn btn-default"><i class="fa fa-plus"></i> Approve</a>
						<a href="{{ route('web.user_order.paid',$order->id) }}"  class="btn btn-default"><i class="fa fa-plus"></i> Set Paid</a>
						@endif

				</div>

				<div class="box-body">
					<table class="table table-bordered">
						<tr>
							<td>Date</td>
							<td>{{ $order->created_at }}</td>
						</tr>

						<tr>
							<td>User</td>
							<td>{{ $order->user->name }}</td>
						</tr>

						<tr>
							<td>Role </td>
							<td>{{ $order->user->role->name }}</td>
						</tr>

						<tr>
							<td>Order Status</td>
							<td><label class="label label-warning">{{ $order->orderStatus->name }}</label></td>
						</tr>

						<tr>
							<td>Payment status</td>
							<td><label class="label label-warning">{{ $order->paymentStatus->name }}</label></td>
						</tr>

						<tr>
							<td>Payment Evidence</td>
							<td><a href="{{ $order->payment_evidence }}"> See Payment Evidence</a></td>
						</tr>

						<tr>
							<td>Grand Total</td>
							<td>{{ $order->total }}</td>
						</tr>

						<tr>
							<td>Customer</td>
							<td>{{ $order->customer_name }}</td>
						</tr>

						<tr>
							<td>Customer Address</td>
							<td>{{ $order->customer_address }}</td>
						</tr>

						<tr>
							<td>Customer Contact</td>
							<td>{{ $order->customer_contact }}</td>
						</tr>
						<tr>
							<td>Customer Email</td>
							<td>{{ $order->customer_email }}</td>
						</tr>


						<tr>
							<td>Payment Evidence</td>
							<td>
								{!! Form::open(['url' => route('web.user_order.evidence',$order->id),'files' => true]) !!}

									<div class="form-group">
										{!! Form::file('file',['class'=>'form-upload']) !!}
									</div>

									<div class="form-group">
										{!! Form::submit('Upload',['class' => 'btn btn-default']) !!}
									</div>
								{!! Form::close() !!}
							</td>
						</tr>
					</table>

					<div class="clearfix"></div>

					<table class="table table-bordered">

						<tr>
							<td>No</td>
							<td>Item</td>
							<td>Quantity</td>
							<td>Total</td>
						</tr>
						@foreach($order->items as $item)

							<tr>
								<td><input type="checkbox" /></td>
								<td>{{ $item->product->product_name }}</td>
								<td>{{ $item->quantity }}</td>
								<td>{{ $item->total }}</td>
							</tr>
							@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
