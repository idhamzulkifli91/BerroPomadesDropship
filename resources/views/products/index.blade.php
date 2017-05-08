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
                    <div class="box-title">{{ $title  }}</div>
                    <a href="{{ route('products.create') }}" class="btn pull-right btn-primary"><i class="fa fa-plus"> </i> Create</a>
                </div>

                <div class="box-body">

                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>No</th>
                            <th>Product</th>
                            <th>Price / Unit</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Stock</th>
                            <th>Manage</th>
                        </tr>

                        @if($products->count())
                            @foreach($products as $product)

                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $product->product_name }}</td>
                                     <td>{{ is_null($config->value('currency')) ? 'RM' : $config->value('currency') }} {{ $product->price }}</td>
                                    <td><label class="label label-info">{{ $product->productStatus->name }}</label></td>
                                    <td>

                                        <img src="{{ $product->image }}" alt="" height="120" width="120" />
                                    </td>

                                    <td>{{ 1 }}</td>
                                    <td>
                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger">Action</button>
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route('products.edit',$product->id) }}"> Edit</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                        @endif

                    </table>
                    {!! $products->render() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
