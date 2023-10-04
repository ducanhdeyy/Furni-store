<?php

namespace App\Repository\Banner;

use App\Repository\RepositoryInterface;

interface BannerRepositoryInterface extends RepositoryInterface
{
    public function getBanner();

    public function store($request);
    public function edit($id,$request);
}
