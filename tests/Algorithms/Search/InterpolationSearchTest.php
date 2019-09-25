<?php

namespace App\Tests\Algorithms\Search;

use App\Algorithms\Search\InterpolationSearch;
use PHPUnit\Framework\TestCase;

class InterpolationSearchTest extends TestCase
{
    public function testSearch(): void
    {
        $input = [3, 7, 6, 9, 4, 1, 8, 2, 5, 10];

        $result1 = InterpolationSearch::search($input, 6);
        $result2 = InterpolationSearch::search($input, 11);

        $this->assertSame(2, $result1);
        $this->assertSame(-1, $result2);
    }
}
