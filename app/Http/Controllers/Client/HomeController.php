<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repository\Banner\BannerRepositoryInterface;
use App\Repository\Blog\BlogRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productRepo;
    protected $bannerRepo;
    protected $blogRepo;
    public function __construct(
        ProductRepositoryInterface $productRepo,
        BannerRepositoryInterface $bannerRepo,
        BlogRepositoryInterface $blogRepo,
    )
    {
        $this->productRepo = $productRepo;
        $this->bannerRepo = $bannerRepo;
        $this->blogRepo = $blogRepo;
    }
    public function index(){
        $products = $this->productRepo->getProductHome();
        $banners = $this->bannerRepo->getBanner();
        $blogs = $this->blogRepo->getHomeBlog();
        return view('client.index',[
            'banners'=>$banners,
            'products'=>$products,
            'blogs'=>$blogs
        ]);
    }
}
