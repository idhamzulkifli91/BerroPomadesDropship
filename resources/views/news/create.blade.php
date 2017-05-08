@extends('backpack::layout')

@section('header')
	<section class="content-header">
		<div class="row-fluid">
			<ul class="breadcrumb">
				<li>News</li>
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
						{!! Form::open(['url' => route('news.store')]) !!}

							<div class="form-group">
								{!! Form::text('title',old('title'),['class' => 'form-control','placeholder' => 'Title']) !!}
							</div>

						<div class="form-group">
							<select name="status" id="" class="form-control">
								<option value="0">Draft</option>
								<option value="1">Published</option>
							</select>
						</div>

						<div class="form-group">
							{!! Form::textarea('body',old('body'),['class' => 'form-control','style' => 'resize:none; height: 220px']) !!}
						</div>

						<div class="form-group">
							{!! Form::submit('Publish',['class' => 'btn btn-default']) !!}
						</div>

						{!! Form::close() !!}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
