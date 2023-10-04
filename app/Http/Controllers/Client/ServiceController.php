<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repository\Banner\BannerRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $bannerRepo;
    protected $productRepo;

    public function __construct(
        BannerRepositoryInterface $bannerRepo,
        ProductRepositoryInterface $productRepo,
    )
    {
        $this->bannerRepo = $bannerRepo;
        $this->productRepo = $productRepo;
    }
    public function services(){
        $banners = $this->bannerRepo->getBanner();
        $products = $this->productRepo->getProductHome();
        return view('client.services',[
            'banners'=>$banners,
            'products'=>$products
        ]);
    }
}
