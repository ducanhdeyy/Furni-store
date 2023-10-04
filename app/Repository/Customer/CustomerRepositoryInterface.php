<?php

namespace App\Repository\Customer;

use App\Repository\RepositoryInterface;

interface CustomerRepositoryInterface extends RepositoryInterface
{
    public function getCustomer();

    public function store($request);
    public function edit($id, $request);
}
