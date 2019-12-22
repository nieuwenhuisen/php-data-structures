<?php

declare(strict_types=1);

namespace App\Tests\Algorithms\Graph;

use App\Algorithms\Graph\ShortestPathBellmanFord;
use PHPUnit\Framework\TestCase;

class ShortestPathBellmanFordTest extends TestCase
{
    public function testShortestPath(): void
    {
        \define('I', PHP_INT_MAX);

        $graph = [
            0 => [I, 3, 5, 9, I, I],
            1 => [3, I, 3, 4, 7, I],
            2 => [5, 3, I, 2, 6, 3],
            3 => [9, 4, 2, I, 2, 2],
            4 => [I, 7, 6, 2, I, 5],
            5 => [I, I, 3, 2, 5, I],
        ];

        $shortestPaths = ShortestPathBellmanFord::paths($graph, 0);

        $this->assertSame(0, $shortestPaths[0], 'Distance from 0 to 0 is not 0');
        $this->assertSame(3, $shortestPaths[1], 'Distance from 0 to 1 is not 3');
        $this->assertSame(5, $shortestPaths[2], 'Distance from 0 to 2 is not 5');
        $this->assertSame(7, $shortestPaths[3], 'Distance from 0 to 3 is not 7');
        $this->assertSame(9, $shortestPaths[4], 'Distance from 0 to 4 is not 9');
        $this->assertSame(8, $shortestPaths[5], 'Distance from 0 to 5 is not 8');
    }
}
