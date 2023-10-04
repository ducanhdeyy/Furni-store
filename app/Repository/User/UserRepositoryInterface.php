<?php

namespace App\Repository\User;

use App\Repository\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getUser();
    public function store($request);
    public function edit($id, $request);
    public function getRole();
}
