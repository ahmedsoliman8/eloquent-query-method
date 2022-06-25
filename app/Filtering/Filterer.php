<?php

namespace  App\Filtering;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Filterer{

    public function __construct(protected Request $request, protected  Builder $builder)
    {
    }

    public  function filter(array $filters){

        foreach ($filters as $filter){

            if (!$this->request->has($filter->queryParam)){
                continue;
            }
            $filter->apply($this->builder,$this->request->get($filter->queryParam));
        }

        return $this->builder;

    }

}
