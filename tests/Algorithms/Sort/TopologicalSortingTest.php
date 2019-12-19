<?php

declare(strict_types=1);

namespace App\Tests\Algorithms\Sort;

use App\Algorithms\Sort\TopologicalSorting;
use PHPUnit\Framework\TestCase;

class TopologicalSortingTest extends TestCase
{
    public function testTopologicalSort(): void
    {
        $graph = [
            [0, 0, 0, 0, 1],
            [1, 0, 0, 1, 0],
            [0, 1, 0, 1, 0],
            [0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0],
        ];

        $sorted = TopologicalSorting::sort($graph);

        $this->assertSame([
            2, 1, 0, 3, 4,
        ], $sorted);
    }
}
