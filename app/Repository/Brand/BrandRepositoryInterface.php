<?php

namespace App\Repository\Brand;

use App\Repository\RepositoryInterface;

interface BrandRepositoryInterface extends RepositoryInterface
{
    public function getBrand();

    public function store($request);
    public function edit($id, $request);
    public function getBrandIndex();
    public function getBrandLate();
}
