<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repository\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $productRepo;
    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }
    public function shop(){
        $products = $this->productRepo->getProductShop();
        return view('client.shop',compact('products'));
    }
}
