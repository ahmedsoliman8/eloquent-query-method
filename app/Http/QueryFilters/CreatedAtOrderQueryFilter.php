<?php

namespace App\Http\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class CreatedAtOrderQueryFilter
{
    public function handle(Builder $builder, $next)
    {

        if (!$direction = request()->get('created_at_order')) {
            return $next($builder);
        }
        return $next($builder)
            ->reorder()
            ->orderBy('created_at', $direction);

    }
}
