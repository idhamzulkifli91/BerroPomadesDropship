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

    @inject('setting','App\Setting')
    @inject('discount','App\UserDiscount')
    @inject('config','App\Configuration')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">{{ trans('backpack::base.login_status') }}</div>
                </div>

                <div class="box-body">
                    <div class="row">
                       @if($products->count())
                           @foreach($products as $product)
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img src="{{ $product->image }}" alt="...">
                                        <div class="caption">
                                            <h3>{{ $product->product_name }}</h3>
                                            <h3>{{ is_null($config->value('currency')) ? 'RM' : $config->value('currency') }} {{ $product->price - $discount->afterDiscount($product->id,auth()->user()->role_id) }}</h3>
                                            <p>{{ $product->description }}</p>
                                                <p>
                                                    <a href="{{ route('web.product.shop.add',$product->id) }}" class="btn btn-primary" role="button"> <i class="fa fa-shopping-cart"> </i> </a>
                                                    <a href="#" class="btn btn-default" role="button"><i class="fa fa-eye"></i> Details</a></p>
                                        </div>
                                    </div>
                                </div>
                           @endforeach
                           @endif
                    </div>
                    {!! $products->render() !!}
                </div>


            </div>
        </div>
    </div>
@endsection
