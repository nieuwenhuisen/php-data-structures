<?php

declare(strict_types=1);

namespace App\Tests\Algorithms\Graph;

use App\Algorithms\Graph\PrimMinimumSpanningTree;
use PHPUnit\Framework\TestCase;

final class PrimMinimumSpanningTreeTest extends TestCase
{
    public function testMinimumSpanningTree(): void
    {
        $graph = [
            [0, 3, 1, 6, 0, 0],
            [3, 0, 5, 0, 3, 0],
            [1, 5, 0, 5, 6, 4],
            [6, 0, 5, 0, 0, 2],
            [0, 3, 6, 0, 0, 6],
            [0, 0, 4, 2, 6, 0],
        ];

        $minimumTree = PrimMinimumSpanningTree::minimumTree($graph);

        $this->assertSame([
            'minimum_cost' => 13,
            'edges' => [
                ['source' => 0, 'destination' => 1, 'cost' => 3],
                ['source' => 0, 'destination' => 2, 'cost' => 1],
                ['source' => 5, 'destination' => 3, 'cost' => 2],
                ['source' => 1, 'destination' => 4, 'cost' => 3],
                ['source' => 2, 'destination' => 5, 'cost' => 4],
            ],
        ], $minimumTree);
    }
}
