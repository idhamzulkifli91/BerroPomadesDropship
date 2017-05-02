@extends('backpack::layout')

@section('header')
	<section class="content-header">
		<div class="row-fluid">
			<ul class="breadcrumb">
				<li>File Manager</li>
				<li>List</li>
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
					<div class="row-fluid">
						{{--<button data-toggle="modal" data-target="#myModal" type="button" class="btn pull-right btn-primary"><i class="fa fa-plus"></i> New File</button>--}}
					</div>
				</div>

				<div class="box-body">

					<table class="table">
						<tr>
							<th>&nbsp;</th>
							<th>File name</th>
							<th>Size</th>
							<th>Download Path</th>
							<th>Status</th>
						</tr>


						@if($files->count())
							@foreach($files as $file)
								<tr>
									<td><input type="checkbox" value="{{ $file->id }}" /></td>
									<td>{{ $file->name }}</td>
									<td>{{ $file->size }} MB</td>
									<td><a target="_blank" href="{{ $file->document_path }}">{{ $file->name }}</a></td>
									<td><label class="label label-info">{{ $file->status }}</label></td>
									{{--<td>--}}
										{{--<a href="{{ route('filemanager.remove',$file->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>--}}
									{{--</td>--}}
								</tr>
							@endforeach
						@endif


						{!! $files->render() !!}
					</table>

				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Upload New File</h4>
				</div>

				{!! Form::open(['url' => route('filemanager.store'),'files' => true]) !!}
				<div class="modal-body">

					<div class="form-group">
						{!! Form::file('file',['class' => 'form-control']) !!}
					</div>

					<div class="form-group">
						<select class="form-control" name="status">
							<option value="1">Publish</option>
							<option value="0">Draft</option>
						</select>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" value="Upload" class="btn btn-primary" />
				</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection
