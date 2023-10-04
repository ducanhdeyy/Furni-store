<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repository\Banner\BannerRepositoryInterface;
use App\Repository\Blog\BlogRepositoryInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogRepo;
    protected $bannerRepo;
    public function __construct(
        BlogRepositoryInterface $blogRepo,
        BannerRepositoryInterface $bannerRepo
    ) {
        $this->blogRepo = $blogRepo;
        $this->bannerRepo = $bannerRepo;
    }
    public function index()
    {
        $blogs = $this->blogRepo->getBlogHome();
        $banners = $this->bannerRepo->getBanner();
        return view('client.blog', compact('blogs','banners'));
    }
}
