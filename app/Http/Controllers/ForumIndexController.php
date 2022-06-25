<?php

namespace App\Http\Controllers;

use App\AddNumber;
use App\Http\QueryFilters\CreatedAtOrderQueryFilter;
use App\Http\QueryFilters\UnsolvedQueryFilter;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class ForumIndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $discussions = app(Pipeline::class)
            ->send( Discussion::latest())
            ->through([
                UnsolvedQueryFilter::class.':'.$request->get('unsolved'),
               // CreatedAtOrderQueryFilter::class
            ])
            ->thenReturn()
            ->get();

        // dd($discussions);

        return view('forum.index', [
            'discussions' => $discussions
        ]);

    }
}
