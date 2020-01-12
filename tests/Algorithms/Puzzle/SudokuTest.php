<?php

declare(strict_types=1);

namespace App\Tests\Algorithms\Puzzle;

use App\Algorithms\Puzzle\Sudoku;
use PHPUnit\Framework\TestCase;

final class SudokuTest extends TestCase
{
    public function testSolve(): void
    {
        $grid = [
            [0, 0, 7, 0, 3, 0, 8, 0, 0],
            [0, 0, 0, 2, 0, 5, 0, 0, 0],
            [4, 0, 0, 9, 0, 6, 0, 0, 1],
            [0, 4, 3, 0, 0, 0, 2, 1, 0],
            [1, 0, 0, 0, 0, 0, 0, 0, 5],
            [0, 5, 8, 0, 0, 0, 6, 7, 0],
            [5, 0, 0, 1, 0, 8, 0, 0, 9],
            [0, 0, 0, 5, 0, 3, 0, 0, 0],
            [0, 0, 2, 0, 9, 0, 5, 0, 0],
        ];

        $result = Sudoku::solve($grid);

        $this->assertTrue($result);
        $this->assertSame([
            [2, 9, 7, 4, 3, 1, 8, 5, 6],
            [3, 6, 1, 2, 8, 5, 4, 9, 7],
            [4, 8, 5, 9, 7, 6, 3, 2, 1],
            [7, 4, 3, 6, 5, 9, 2, 1, 8],
            [1, 2, 6, 8, 4, 7, 9, 3, 5],
            [9, 5, 8, 3, 1, 2, 6, 7, 4],
            [5, 3, 4, 1, 2, 8, 7, 6, 9],
            [8, 7, 9, 5, 6, 3, 1, 4, 2],
            [6, 1, 2, 7, 9, 4, 5, 8, 3],
        ], $grid);
    }
}
