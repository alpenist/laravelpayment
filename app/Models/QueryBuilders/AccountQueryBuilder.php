<?php

namespace App\Models\QueryBuilders;

use App\Models\Account;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Query\Builder as QueryBuilder;

class AccountQueryBuilder extends EloquentBuilder
{

    /**
     * @param int|string $id
     * @return Account
     * @throws ModelNotFoundException
     */
    public function withId(int|string $id): Account
    {
        return $this->findOrFail((int)$id)?->first();
    }
}