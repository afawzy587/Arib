<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;


interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function getUsersPaginate($filters): Collection;
}
