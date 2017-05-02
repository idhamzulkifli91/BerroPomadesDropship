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
					<a href="{{ route('news.create') }}" class="btn pull-right btn-primary"><i class="fa fa-plus"> </i> Create</a>
				</div>

				<div class="box-body">

					<table class="table table-bordered table-hover">
						<tr>
							<th>No</th>
							<th>Title</th>
							<th>Content</th>
							<th>Status</th>
							<th>Date Published</th>
							<th>Manage</th>
						</tr>

						@if($news->count())

							@php $counter = 1 @endphp
							@foreach($news as $new)

								<tr>
									<td>{{ $counter++ }}</td>
									<td>{{ $new->title }}</td>
									<td>{{ str_limit($new->body,20) }} <a href="#"> ..read more</a></td>
									<td>{{ $new->status }}</td>
									<td>{{ $new->created_at }}</td>
									<td>
										<!-- Split button -->
										<div class="btn-group">
											<button type="button" class="btn btn-danger">Action</button>
											<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="caret"></span>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul class="dropdown-menu">
												<li><a href="{{ route('news.edit',$new->id) }}"> Edit</a></li>
												<li><a href="{{ route('web.inventory.delete',$new->id) }}"> Delete</a></li>
											</ul>
										</div>
									</td>
								</tr>

							@endforeach
						@endif

					</table>
					{!! $news->render() !!}

				</div>
			</div>
		</div>
	</div>
@endsection
