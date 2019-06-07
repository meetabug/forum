<?php

namespace App\Filters;

use App\User;

class ThreadsFilters extends Filters
{
    protected $filters = ['by', 'popularity'];

    /**
     * @param $username
     * @return mixed
     */
    protected function by($username)
    {
        $user = User::where('name', $username)->firstOrfail();

        return $this->builder->where('user_id', $user->id);
    }

    /**
     * @return mixed
     */
    public function popularity()
    {
        $this->builder->getQuery()->orders = [];

        return $this->builder->orderBy('replies_count', 'desc');
    }
}