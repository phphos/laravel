<?php

namespace PHPHos\Laravel\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Ramsey\Uuid\Uuid;

class ModelScope implements Scope
{
    /**
     * @inheritdoc
     */
    public function apply(Builder $builder, Model $model)
    {
        return $builder->where([
            ['domain', '=', $model->getDomain()],
            ['tenant_id', '=', Uuid::NIL],
        ]);
    }
}
