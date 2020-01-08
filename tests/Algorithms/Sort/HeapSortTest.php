<?php

declare(strict_types=1);

namespace App\Tests\Algorithms\Sort;

use App\Algorithms\Sort\HeapSort;
use PHPUnit\Framework\TestCase;

class HeapSortTest extends TestCase
{
    public function testHeapSort(): void
    {
        $sorted = HeapSort::sort([37, 44, 34, 65, 26, 86, 143, 129, 9]);

        $this->assertSame(
            [9, 26, 34, 37, 44, 65, 86, 129, 143],
            $sorted
        );
    }
}
