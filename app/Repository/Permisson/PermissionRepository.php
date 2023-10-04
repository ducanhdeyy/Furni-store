<?php

namespace App\Repository\Permission;

use App\Models\Permission;
use App\Repository\BaseRepository;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{

    public function getModel()
    {
        return Permission::class;
    }

    public function getPermission()
    {
        return $this->model->search()->get();
    }
}
