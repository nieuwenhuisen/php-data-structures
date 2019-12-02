<?php

namespace App\Tests\Algorithms\Search;

use App\Algorithms\Search\GraphDepthFirstSearch;
use PHPUnit\Framework\TestCase;

class GraphDepthFirstSearchTest extends TestCase
{
    public function testSearch(): void
    {
        $graph = [
            1 => [1 => 0, 2 => 1, 3 => 0, 4 => 0, 5 => 1, 6 => 0],
            2 => [1 => 1, 2 => 0, 3 => 1, 4 => 0, 5 => 1, 6 => 0],
            3 => [1 => 0, 2 => 1, 3 => 0, 4 => 1, 5 => 0, 6 => 0],
            4 => [1 => 0, 2 => 0, 3 => 1, 4 => 0, 5 => 1, 6 => 1],
            5 => [1 => 1, 2 => 1, 3 => 0, 4 => 1, 5 => 0, 6 => 0],
            6 => [1 => 0, 2 => 0, 3 => 0, 4 => 1, 5 => 0, 6 => 0],
        ];

        $path = GraphDepthFirstSearch::search($graph, 1);

        $this->assertSame(
            [1, 2, 5, 3, 4, 6],
            $path
        );
    }
}
