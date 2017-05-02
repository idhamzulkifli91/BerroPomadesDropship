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
						{!! Form::open(['url' => route('users.store')]) !!}

						<div class="form-group">
							{!! Form::text('name',old('name'),['class' => 'form-control','placeholder' => 'Full Name']) !!}
						</div>


						<div class="form-group">
							{!! Form::text('email',old('email'),['class' => 'form-control','placeholder' => 'Email']) !!}
						</div>


						<div class="form-group">
							{!! Form::text('contact',old('contact'),['class' => 'form-control','placeholder' => 'Mobile']) !!}
						</div>


						<div class="form-group">
							{!! Form::text('address',old('address'),['class' => 'form-control','placeholder' => 'Address']) !!}
						</div>


						<div class="form-group">
							{!! Form::text('postcode',old('postcode'),['class' => 'form-control','placeholder' => 'Postcode']) !!}
						</div>


						<div class="form-group">
							{!! Form::text('country',old('country'),['class' => 'form-control','placeholder' => 'Country']) !!}
						</div>


						<div class="form-group">
							{!! Form::text('state',old('state'),['class' => 'form-control','placeholder' => 'State']) !!}
						</div>


						<div class="form-group">
							<select name="role_id" id="" class="form-control">
								<option value="2"> Leader</option>
							</select>
						</div>


						<div class="form-group">
							{!! Form::submit('Create',['class'=>'btn btn-danger']) !!}
						</div>
						{!! Form::close() !!}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
