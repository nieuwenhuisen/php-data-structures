<?php

namespace App\Tests\Algorithms\Graph;

use App\Algorithms\Graph\ShortestPathDijkstra;
use PHPUnit\Framework\TestCase;

class ShortestPathDijkstraTest extends TestCase
{
    public function testShortestPath(): void
    {
        $graph = [
            'A' => ['B' => 3, 'C' => 5, 'D' => 9],
            'B' => ['A' => 3, 'C' => 3, 'D' => 4, 'E' => 7],
            'C' => ['A' => 5, 'B' => 3, 'D' => 2, 'E' => 6, 'F' => 3],
            'D' => ['A' => 9, 'B' => 4, 'C' => 2, 'E' => 2, 'F' => 2],
            'E' => ['B' => 7, 'C' => 6, 'D' => 2, 'F' => 5],
            'F' => ['C' => 3, 'D' => 2, 'E' => 5],
        ];

        $shortestPaths = ShortestPathDijkstra::path($graph, 'A', 'F');

        $this->assertSame([
            'distance' => 8,
            'path' => ['A', 'C', 'F'],
        ], $shortestPaths);
    }
}
