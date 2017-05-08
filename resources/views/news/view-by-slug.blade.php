@extends('backpack::layout')

@section('header')
	<section class="content-header">
		<div class="row-fluid">
			<ul class="breadcrumb">
				<li>News</li>
				<li>Read</li>
			</ul>
		</div>
	</section>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8">
			<div class="box box-default">
				<div class="box-header with-border">
					<div class="box-title">{{ $title }}</div>
				</div>

				<div class="box-body">

					<h3>{{ $news->title }}</h3>

					<p>
						{{ $news->body }}
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection
