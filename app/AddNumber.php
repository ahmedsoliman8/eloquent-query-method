<?php

namespace App;
class  AddNumber
{

    public function handle($number, $next)
    {
        $number = $number + 1;
        return $next($number);
    }

}
