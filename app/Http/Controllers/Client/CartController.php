<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repository\Product\ProductRepositoryInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $productRepo;
    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }
    public function index()
    {
        $carts = Cart::content();
        $total = Cart::subtotal();
        //$total = str_replace('.00', '', $total);
        return view('client.cart', compact('carts', 'total'));
    }

    public function add(Request $request)
    {
        $products = $this->productRepo->find($request->product_id);
        Cart::add([
            'id' => $products->id,
            'name' => $products->name,
            'qty' => $request->quantity,
            'price' => $products->price,
            'options' => [
                'image' => $products->path_image
            ]
        ]);
        return redirect()->route('cart');
    }
    public function delete($rowId)
    {
        Cart::remove($rowId);
        return back();
    }

    public function update(Request $request){
        if ($request->has('qty')) {
            foreach ($request->qty as $rowId => $quantity) {
                Cart::update($rowId, $quantity);
            }
        }

        return back();
    }

    public function destroy()
    {
        Cart::destroy();
        return back();
    }
}
