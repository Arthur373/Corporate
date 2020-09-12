<?php

namespace App\Repositories;

use App\Models\Menu;
use App\Models\Role;

class RolesRepository extends Repository{

    public function __construct(Role $role){
    $this->model = $role;
    }
}
