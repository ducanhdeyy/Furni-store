<?php

namespace App\Repository\Permission;

use App\Repository\RepositoryInterface;

interface PermissionRepositoryInterface extends RepositoryInterface
{
    public  function getPermission();
}
