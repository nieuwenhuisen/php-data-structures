<?php

namespace App\Tests\Algorithms;

use App\Algorithms\SelectionSort;
use PHPUnit\Framework\TestCase;

class SelectionSortTest extends TestCase
{
    public function testSelectionSort(): void
    {
        $input = [3, 7, 6, 9, 4, 1, 8, 2, 5, 10];
        $expected = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

        // Iterations: 45
        $sorted = SelectionSort::sort($input);

        $this->assertEquals($expected, $sorted);
    }
}
