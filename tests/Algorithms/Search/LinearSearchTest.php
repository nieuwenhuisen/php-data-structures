<?php

declare(strict_types=1);

namespace App\Tests\Algorithms\Search;

use App\Algorithms\Search\LinearSearch;
use PHPUnit\Framework\TestCase;

class LinearSearchTest extends TestCase
{
    public function testSearch(): void
    {
        $input = [3, 7, 6, 9, 4, 1, 8, 2, 5, 10];
        $result1 = LinearSearch::search($input, 6);
        $result2 = LinearSearch::search($input, 11);

        $this->assertTrue($result1);
        $this->assertFalse($result2);
    }
}
