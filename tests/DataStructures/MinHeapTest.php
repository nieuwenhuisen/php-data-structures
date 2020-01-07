<?php

declare(strict_types=1);

namespace App\Tests\DataStructures;

use App\DataStructures\Heap\MinHeap;
use PHPUnit\Framework\TestCase;

final class MinHeapTest extends TestCase
{
    public function testMinHeap(): void
    {
        $input = [37, 44, 34, 65, 26, 86, 129, 83, 9];
        $minHeap = new MinHeap(\count($input));
        $minHeap->create($input);

        $this->assertSame(
            [9, 26, 37, 34, 44, 86, 129, 83, 65],
            $minHeap->getHeap()
        );
    }
}
