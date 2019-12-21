<?php

declare(strict_types=1);

namespace App\Tests\Algorithms\Graph;

use App\Algorithms\Graph\ShortestPathFloydWarshall;
use PHPUnit\Framework\TestCase;

class ShortestPathFloydWarshallTest extends TestCase
{
    public function testShortestPath(): void
    {
        \define('A', 0);
        \define('B', 1);
        \define('C', 2);
        \define('D', 3);
        \define('E', 4);

        $graph = [
            A => [
                A => 0,
                B => 10,
                C => PHP_INT_MAX,
                D => 5,
                E => PHP_INT_MAX,
            ],
            B => [
                A => 10,
                B => 0,
                C => 5,
                D => 5,
                E => 10,
            ],
            C => [
                A => PHP_INT_MAX,
                B => 5,
                C => 0,
                D => PHP_INT_MAX,
                E => PHP_INT_MAX,
            ],
            D => [
                A => 5,
                B => 5,
                C => PHP_INT_MAX,
                D => 0,
                E => 20,
            ],
            E => [
                A => PHP_INT_MAX,
                B => 10,
                C => PHP_INT_MAX,
                D => 20,
                E => 0,
            ],
        ];

        $shortestPaths = ShortestPathFloydWarshall::paths($graph);

        $this->assertSame(20, $shortestPaths[A][E], 'Shortest distance between A to E is not 20');
        $this->assertSame(10, $shortestPaths[D][C], 'Shortest distance between D to C is not 10');
    }
}
