<?php

namespace App\Repository\Category;

use App\Repository\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    public function getCategory();

    public function getAdd($parent, $text);

    public function  getEdit($parent,$text);
}
