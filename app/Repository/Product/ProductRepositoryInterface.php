<?php

namespace App\Repository\Product;

use App\Repository\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getProduct();

//lấy các category in ra create
    public function getCategory($parent, $text);

//  câu lệnh insert được thưc thi trong hàm này
    public function store($request);

//  câu lệnh update được thưc thi trong hàm này
    public function edit($id, $request);

//lấy các category in ra edit
    public function getCategoryEdit($category_id, $parent, $text);

    public function destroy($id);

    public function getProductApi($category_id);

    public function getProductHome();

    public function getProductShop();

    public function getRelateProduct( $category_id);

    public function getProductComments($id);

}
