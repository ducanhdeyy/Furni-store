<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repository\Banner\BannerRepositoryInterface;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    protected $bannerRepo;
    public function __construct(BannerRepositoryInterface $bannerRepo) {
        $this->bannerRepo = $bannerRepo;
    }
    public function about(){
        $banners = $this->bannerRepo->getBanner();
        return view('client.about',compact('banners'));
    }
}
