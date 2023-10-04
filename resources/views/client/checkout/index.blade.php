@extends('client.layout.main')
@section('content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Checkout</h1>
                    </div>
                </div>
                <div class="col-lg-7">
                </div>
            </div>
        </div>
    </div>
    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="border p-4 rounded" role="alert">
                        Returning customer? <a href="{{ route('client_signIn') }}">Click here</a> to login
                    </div>
                </div>
            </div>
            <x-alert/>
            <form action="{{route('addOrder')}}" method="post">
                @csrf
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Billing Details</h2>
                    <div class="p-3 p-lg-5 border bg-white">
                        <div class="form-group row">
                            <input type="hidden" name="customer_id" value="{{$customer->id}}">
                            <input type="hidden" name="status" value="1">
                            <input type="hidden" name="total" value="{{$total}}">
                            <div class="col-md-6">
                                <label for="c_fname" class="text-black">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $customer->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $customer->address }}">
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-md-6">
                                <label for="c_email_address" class="text-black">Email Address <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $customer->email }}">
                            </div>
                            <div class="col-md-6">
                                <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_phone" name="phone"
                                    value="{{ $customer->phone }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="c_order_notes" class="text-black">Order Notes</label>
                            <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                                placeholder="Write your notes here..."></textarea>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Your Order</h2>
                        <div class="p-3 p-lg-5 border bg-white">
                            <table class="table site-block-order-table mb-5">
                                <thead>
                                    <th>Product</th>
                                    <th>Total</th>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td class="text-black font-weight-bold">{{ $cart->name }} <strong
                                                    class="mx-2">x</strong> {{ $cart->qty }}</td>
                                            <td>${{ number_format($cart->price * $cart->qty, 2, '.', '') }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                                        <td class="text-black">${{ $subtotal }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                        <td class="text-black font-weight-bold"><strong>${{ $total }}</strong>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                            <div class="border p-3 mb-3">
                                <div class="pc-item">
                                    <label for="pc-check"
                                        style="
                                        color: black;
                                        font-weight: 500;
                                    ">
                                        Pay on delivery
                                        <input type="radio" id="pc-check" name="payment_name" value="pay_last" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="border p-3 mb-3">
                                <div class="pc-item">
                                    <label for="pc-check"
                                        style="
                                        color: black;
                                        font-weight: 500;
                                    ">
                                        Momo Payment
                                        <input type="radio" id="pc-check" name="payment_name" value="momo_payment"
                                            checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="border p-3 mb-5">
                                <div class="pc-item"
                                    style="
                                    color: black;
                                    font-weight: 500;
                                ">
                                    <label for="pc-check text-black">
                                        VNpay Payment
                                        <input type="radio" id="pc-check" name="payment_name" value="vnpay_payment"
                                            checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="redirect" class="btn btn-black btn-lg py-3 btn-block">Place
                                    Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
    </div>
@endsection
