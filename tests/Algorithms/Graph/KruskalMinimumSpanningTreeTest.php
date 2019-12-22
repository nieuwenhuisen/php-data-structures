<?php

declare(strict_types=1);

namespace App\Tests\Algorithms\Graph;

use App\Algorithms\Graph\KruskalMinimumSpanningTree;
use PHPUnit\Framework\TestCase;

final class KruskalMinimumSpanningTreeTest extends TestCase
{
    public function testMinimumSpanningTree(): void
    {
        $minimumTree = KruskalMinimumSpanningTree::minimumTree([
            [0, 3, 1, 6, 0, 0],
            [3, 0, 5, 0, 3, 0],
            [1, 5, 0, 5, 6, 4],
            [6, 0, 5, 0, 0, 2],
            [0, 3, 6, 0, 0, 6],
            [0, 0, 4, 2, 6, 0],
        ]);

        $this->assertSame(
            [
                ['from' => 2, 'to' => 0, 'cost' => 1],
                ['from' => 5, 'to' => 3, 'cost' => 2],
                ['from' => 1, 'to' => 0, 'cost' => 3],
                ['from' => 4, 'to' => 1, 'cost' => 3],
                ['from' => 5, 'to' => 2, 'cost' => 4],
            ],
            $minimumTree
        );

        $totalCost = 0;

        foreach ($minimumTree as $vertex) {
            $totalCost += $vertex['cost'];
        }

        $this->assertSame(13, $totalCost);
    }
}
