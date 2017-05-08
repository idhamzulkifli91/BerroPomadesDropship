@extends('backpack::layout')

@section('header')
	<section class="content-header">
		<div class="row-fluid">
			<ul class="breadcrumb">
				<li>Inventory</li>
				<li>Topup</li>
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
						{!! Form::open(['url' => route('web.inventory.topup_update',$stock->id),'method' => 'PUT']) !!}

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
