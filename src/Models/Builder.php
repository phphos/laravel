<?php

namespace PHPHos\Laravel\Models;

use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Builder as BaseBuilder;
use PHPHos\Laravel\Models\Paginator;

class Builder extends BaseBuilder
{
    /**
     * @inheritdoc
     */
    protected function paginator($items, $total, $perPage, $currentPage, $options)
    {
        return Container::getInstance()
            ->makeWith(Paginator::class, compact(
                'items',
                'total',
                'perPage',
                'currentPage',
                'options'
            ));
    }
}
