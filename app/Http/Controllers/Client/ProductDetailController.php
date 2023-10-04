<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repository\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    //
    protected $productRepo;
    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }
    public function index($id){
        $product = $this->productRepo->find($id);
        return view('client.productDetail',compact('product'));
    }
}
