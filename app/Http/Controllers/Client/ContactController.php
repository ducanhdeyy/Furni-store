<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repository\Banner\BannerRepositoryInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $bannerRepo;
    public function __construct(BannerRepositoryInterface $bannerRepo)
    {
        $this->bannerRepo = $bannerRepo;
    }
    public function contact(){
        $banners = $this->bannerRepo->getBanner();
        return view('client.contact',compact('banners'));
    }
}
