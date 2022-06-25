<?php

namespace Tests\Feature;

use App\Http\QueryFilters\UnsolvedQueryFilter;
use App\Models\Discussion;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UnsolvedQueryFilterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $discussions = Discussion::factory()
            ->times(2)
            ->state(new Sequence(['solved_at' => null], ['solved_at' => now()]))
            ->create();

        $filter=new UnsolvedQueryFilter();

        $filtered=$filter->handle(Discussion::query(),fn($builder)=>$builder,'true');

        $this->assertEquals(1,$filtered->count());
    }
}
