<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class BaseRepository implements BaseRepositoryInterface
{
    protected $local;
    protected $paginate;
    public function __construct(protected Model $model)
    {
      $this->local = app()->getLocale();
      $this->paginate = config('arib.paginate');
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find(int|string $id): object
    {
        return (object) $this->model->findOrFail($id);
    }

    public function create(array $data): object
    {
        return $this->model->create([$data]);
    }

    public function update(string|int $id, array $data): object
    {
        return (object) tap($this->model->findOrFail($id))->update($data)->get();
    }

    public function delete(int|string $id): bool
    {
      return $this->model->findOrFail($id)->delete();
    }

}
