<?php

namespace  App\Filtering;

use Illuminate\Database\Eloquent\Builder;

class PublishedFilter{

    public  $queryParam='published';
    public  function  apply(Builder $builder,$value){

    //    $v=$value=='true'?true:'';
        $builder->wherePublished($value);
    }

}
