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
                    <div class="row-fluid">
                        <a href="{{ route('users.create') }}" type="button" class="btn pull-right btn-primary"><i class="fa fa-plus"></i> Create</a>
                    </div>
                </div>

                <div class="box-body">



                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Type</th>
                            <th>Manage</th>
                        </tr>

                        @if($users->count())
                                @foreach($users as $user)

                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->contact }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>
                                    <!-- Split button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger">Action</button>
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('users.edit',$user->id) }}"> Edit</a></li>
                                            <li> <a href="#" type="submit"> Remove</a></li>

                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                            @endif

                    </table>
                    {!! $users->render() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
