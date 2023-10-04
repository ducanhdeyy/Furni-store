@extends('client.layout.main')
@section('content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Cart</h1>
                    </div>
                </div>
                <div class="col-lg-7">
                </div>
            </div>
        </div>
    </div>
    <div class="untree_co-section before-footer-section">
        <div class="container">
            <form action="{{ route('product_cart_update') }}" class="col-md-12" method="post">
                @csrf
                <x-alert/>
                @if ($carts->count() > 0)
                    <div class="row mb-5">
                        <div class="site-blocks-table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-total">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <img src="{{ asset($cart->options->image) }}" alt="Image"
                                                    class="img-fluid">
                                            </td>
                                            <td class="product-name">
                                                <h2 class="h5 text-black">{{ $cart->name }}</h2>
                                            </td>
                                            <td>${{ number_format($cart->price, 2, '.', '') }}</td>
                                            <td>
                                                <div class="input-group mb-3 align-items-center quantity-container"
                                                    style="justify-content:center">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-black decrease"
                                                            type="button">&minus;</button>
                                                    </div>
                                                    <div style="max-width:140px"><input type="text"
                                                            name="qty[{{ $cart->rowId }}]"
                                                            class="form-control text-center quantity-amount"
                                                            value="{{ $cart->qty }}" placeholder=""
                                                            aria-label="Example text with button addon"
                                                            aria-describedby="button-addon1" onchange="updatePrice(this)">
                                                    </div>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-black increase"
                                                            type="button">&plus;</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>${{ number_format($cart->price * $cart->qty, 2, '.', '') }}</td>
                                            <td><a onclick="return confirm('Do you really want to delete this item?')"
                                                    href="{{ route('deleteProduct', $cart->rowId) }}"
                                                    class="btn btn-black btn-sm">X</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 mb-3 mb-md-0">
                            <button type="submit" class="btn btn-black btn-sm btn-block">Update Cart</button>
                        </div>
                    @else
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('shop') }}" class="btn btn-outline-black btn-sm btn-block">Continue
                                Shopping</a>
                        </div>
                @endif
            </div>

        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <span class="text-black">Subtotal</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">${{ $total }}</strong>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Total</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black" id="totalAmount">${{ $total }}</strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{route('product_cart_checkout')}}" class="btn btn-black btn-lg py-3 btn-block">Proceed To Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    </div>

@endsection
