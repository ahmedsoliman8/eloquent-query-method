<?php

namespace App\Http\QueryFilters;

use Illuminate\Database\Eloquent\Builder;

class UnsolvedQueryFilter
{
    public function handle(Builder $builder, $next,$value)
    {

        if (!$value) {
            return $next($builder);
        }
        return $next($builder)
            ->whereNull('solved_at');

    }
}
