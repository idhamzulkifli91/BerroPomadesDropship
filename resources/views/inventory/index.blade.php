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
							<th>Product</th>
							<th>Stock / Unit</th>
							<th>Total</th>
							<th>Manage</th>
						</tr>

						@if($stocks->count())
							@foreach($stocks as $stock)

								<tr>
									<td>{{ $counter++ }}</td>
									<td>{{ $stock->product->product_name }}</td>
									<td>{{ $stock->stock_count }}</td>
									<td>{{ $stock->total }}</td>
									<td>
										<!-- Split button -->
										<div class="btn-group">
											<button type="button" class="btn btn-danger">Action</button>
											<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="caret"></span>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul class="dropdown-menu">
												<li><a href="{{ route('web.inventory.topup',$stock->id) }}"> Topup Item</a></li>
												<li><a href="{{ route('web.inventory.delete',$stock->id) }}"> Delete</a></li>

											</ul>
										</div>
									</td>
								</tr>

							@endforeach
						@endif

					</table>
					{!! $stocks->render() !!}

				</div>
			</div>
		</div>
	</div>
@endsection
