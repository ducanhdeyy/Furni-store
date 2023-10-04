@extends('client.layout.main')
@section('content')
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Shop</h1>
                    <p></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="{{asset('template/client/images/couch.png')}}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            <!-- Start Column 1 -->
            @foreach ($products as $product)
            <div class="col-12 col-md-4 col-lg-3 mb-5">
                <a class="product-item" href="{{route('product_detail',$product->id)}}">
                        <img src="{{asset($product->path_image)}}" class="img-fluid product-thumbnail">
                        <h3 class="product-title">{{$product->name}}</h3>
                        <strong class="product-price">${{$product->price}}</strong>
                        <span class="icon-cross">
                            <img src="{{asset('template/client/images/cross.svg')}}" class="img-fluid">
                        </span>
                    </a>
            </div>
            @endforeach
            <!-- End Column 1 -->
        </div>
    </div>
</div>
@endsection
