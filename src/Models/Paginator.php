<?php

namespace PHPHos\Laravel\Models;

use Illuminate\Pagination\LengthAwarePaginator;

class Paginator extends LengthAwarePaginator
{
    /**
     * @inheritdoc
     */
    public function toArray()
    {
        return [
            'list' => $this->items->toArray(),
            'page' => $this->currentPage(),
            'size' => $this->perPage(),
            'total' => $this->total(),
        ];
    }
}
