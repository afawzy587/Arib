<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
  public function __construct(User $user)
  {
      Parent::__construct($user);
  }

  public function getUsersPaginate($filters): Collection
  {
    return $this->model->filter($filters)->paginate($this->paginate);
  }


}
