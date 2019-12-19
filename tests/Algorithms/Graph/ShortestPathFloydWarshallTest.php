<?php

namespace App\Tests\Algorithms\Graph;

use App\Algorithms\Graph\ShortestPathFloydWarshall;
use PHPUnit\Framework\TestCase;

class ShortestPathFloydWarshallTest extends TestCase
{
    public function testShortestPath(): void
    {
        $totalVertices = 5;
        $graph = [];
        for ($i = 0; $i < $totalVertices; $i++) {
            for ($j = 0; $j < $totalVertices; $j++) {
                $graph[$i][$j] = $i === $j ? 0 : PHP_INT_MAX;
            }
        }

        $graph[0][1] = $graph[1][0] = 10;
        $graph[2][1] = $graph[1][2] = 5;
        $graph[0][3] = $graph[3][0] = 5;
        $graph[3][1] = $graph[1][3] = 5;
        $graph[4][1] = $graph[1][4] = 10;
        $graph[3][4] = $graph[4][3] = 20;

        $path = ShortestPathFloydWarshall::path($graph);
        dump($path);
        exit;
    }
}
