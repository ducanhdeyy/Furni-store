<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guard('cus')->user()){
            $customer = Auth::guard('cus')->user();
            $carts = Cart::content();
            $total = Cart::total();
            // $total = str_replace('.00','',$total);
            $subtotal = Cart::subtotal();
            // $subtotal = str_replace('.00','',$subtotal);
            return view('client.checkout.index',compact('customer','carts','total','subtotal'));
        }else{
            return redirect()->route('client_signIn');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addOrder(Request $request)
    {
        try {
            DB::beginTransaction();
            $total = $request->total;
            $total = str_replace('.00','',$total);
            $subtotal = $request->subtotal;
            $subtotal = str_replace('.00','',$subtotal);
            $dataOrder = [
                'customer_id'=>$request->customer_id,
                'name'=>$request->name,
                'email'=>$request->email,
                'address'=>$request->address,
                'phone'=>$request->phone,
                'status'=>$request->status,
                'payment_name'=>$request->payment_name,
                'total'=>$total,
            ];
            $order = Order::create($dataOrder);

            $carts = Cart::content();
            if ($request->payment_name == 'vnpay_payment') {

//              Gọi Hàm Thanh Toán VNPay
                $this->VNPay_payment($order->id, $order->total);

            } elseif ($request->payment_name == 'momo_payment') {
//                Gọi Hàm thanh toán MOMO
                $this->momo_payment($order->total);
            }
                //  thêm vào bảng order_detail
            foreach ($carts as $cart) {
                $data = [
                    'product_id' => $cart->id,
                    'order_id' => $order->id,
                    'quantity' => $cart->qty,
                    'price' => $cart->price,
                    'total' => $cart->price * $cart->qty,
                ];
                //  trừ đi số hàng tồn kho
                $product = Product::find($cart->id);
                $newAmount = $product->amount - $cart->qty;
                if ($newAmount <= 0) {
                    return redirect()->back()->with('error', 'The product in stock is out of stock! Please choose another product');
                }
                $product->update(['amount' => $newAmount]);

                Order_detail::create($data);
            }
                //  xóa giỏ hàng
            Cart::destroy();
            DB::commit();
            return redirect()->route('cart')->with('success', 'Your order has been successfully placed ');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message' . $e->getMessage() . 'Line :' . $e->getLine());
            return redirect()->back()->with('error', 'Your order Failed ');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
