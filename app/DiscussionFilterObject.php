<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DiscussionFilterObject
{
    public function __construct(public Builder $builder, public Request $request)
    {

    }
}
