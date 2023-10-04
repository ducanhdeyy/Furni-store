@extends('client.layout.main')
<?php
define('BASE_URL',"http://127.0.0.1:8000/")
?>
@section('content')
<div class="we-help-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="imgs-grid">
                    <div class="grid grid-1"><img src="{{BASE_URL.$product->path_image}}" alt="Untree.co"></div>
                    @foreach ($product->productImages as $key =>$image)
                    @if ($key == 0)
                        <div class="grid grid-2"><img src="{{BASE_URL.$image->path_image}}" alt="Untree.co"></div>
                    @elseif ($key == 1)
                        <div class="grid grid-3"><img src="{{BASE_URL.$image->path_image}}" alt="Untree.co"></div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 ps-lg-5">
                <form action="{{route('addCart')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <h2 class="section-title mb-4">{{$product->name}}</h2>
                    <p>{{$product->title}}</p>
                    <ul class="list-unstyled custom-list mt-3">
                        <li>{{$product->description}}</li>
                    </ul>
                    <strong style="font-size: large" class="product-price font-size">${{$product->price}}</strong>
                    <div class="product_variant quantity">
                        <label style="font-weight: 700">Quantity</label>
                        <input class="border rounded-full" min="1" max="1000" value="1" type="number" name="quantity">
                    </div>
                    <button type="submit" class="btn mt-3">Add to cart</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
