<?php

namespace App\Filters;

use tiagomichaelsousa\LaravelFilters\QueryFilters;

class UsersFilters extends QueryFilters
{
    /**
     * Search all.
     *
     * @param  string  $query
     * @return Builder
     */
    public function search($value = '')
    {
        return $this->builder->where('name', 'like', '%' . $value . '%');
    }
}
