<?php

namespace App\Tests\Algorithms\Search;

use App\Algorithms\Search\ExponentialSearch;
use PHPUnit\Framework\TestCase;

class ExponentialSearchTest extends TestCase
{
    public function testSearch(): void
    {
        $input = range(1, 200, 5);

        $result1 = ExponentialSearch::search($input, 150);
        $result2 = ExponentialSearch::search($input, 151);

        $this->assertFalse($result1);
        $this->assertTrue($result2);
    }
}
