<?php

namespace App\Repository\Blog;

use App\Repository\RepositoryInterface;

interface BlogRepositoryInterface extends RepositoryInterface
{
    public  function getBlog();

    public function store($request);

    public function edit($id, $request);

    public  function  destroy($id);
    public function getHomeBlog();

    public function getBlogHome();

    public function getComment($id);
}
