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

	@inject('config','App\Configuration')

	<div class="row">
		<div class="col-md-12">
			<div class="box box-default">
				<div class="box-header with-border">
					<div class="box-title">{{ $title }}</div>
				</div>

				<div class="box-body">

					<div class="col-md-8">
						{!! Form::open(['url' => route('web.setting.store')]) !!}

							<div class="form-group">
								<p style="color: #ccc"> Setup your company name</p>
								{!! Form::text('company_name',$config->value('company_name'),['class' => 'form-control','placeholder' => 'Company name']) !!}
							</div>

						<div class="form-group">
							<p style="color: #ccc"> Setup your company address</p>
							{!! Form::text('company_address',$config->value('company_address'),['class' => 'form-control','placeholder' => 'Company Address']) !!}
						</div>

						<div class="form-group">
							<p style="color: #ccc"> Setup your company contact</p>
							{!! Form::text('company_contact',$config->value('company_contact'),['class' => 'form-control','placeholder' => 'Company Contact']) !!}
						</div>

						<div class="form-group">
							<p style="color: #ccc"> Setup your Currency</p>
							{!! Form::text('currency',is_null($config->value('currency')) ? 'RM' : $config->value('currency'),['class' => 'form-control','placeholder' => 'Currency']) !!}
						</div>

						<div class="form-group">
							{!! Form::submit('Store',['class' => 'btn btn-default']) !!}
						</div>

						{!! Form::close() !!}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
