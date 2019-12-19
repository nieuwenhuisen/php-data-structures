<?php

declare(strict_types=1);

namespace App\Tests\Algorithms\Search;

use App\Algorithms\Search\BinarySearch;
use PHPUnit\Framework\TestCase;

class BinarySearchTest extends TestCase
{
    public function testSearch(): void
    {
        // Binary Search only works with sorted lists
        $input = [1, 2, 3, 4, 5, 6, 7, 8, 9, 12];
        $result1 = BinarySearch::search($input, 6);
        $result2 = BinarySearch::search($input, 11);

        $this->assertTrue($result1);
        $this->assertFalse($result2);
    }
}
