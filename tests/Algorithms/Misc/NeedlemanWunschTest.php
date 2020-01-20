<?php

declare(strict_types=1);

namespace App\Tests\Algorithms\Misc;

use App\Algorithms\Misc\NeedlemanWunsch;
use PHPUnit\Framework\TestCase;

final class NeedlemanWunschTest extends TestCase
{
    public function testSquencing(): void
    {
        $string1 = 'GAATTCAGTTA';
        $string2 = 'GGATCGA';

        $grid = NeedlemanWunsch::squencing($string1, $string2);

        $this->assertSame([
            [0, -1, -2, -3, -4, -5, -6, -7, -8, -9, -10, -11],
            [-1, 1, 0, -1, -2, -3, -4, -5, -6, -7, -8, -9],
            [-2, 0, 0, -1, -2, -3, -4, -5, -4, -5, -6, -7],
            [-3, -1, 1, 1, 0, -1, -2, -3, -4, -5, -6, -5],
            [-4, -2, 0, 0, 2, 1, 0, -1, -2, -3, -4, -5],
            [-5, -3, -1, -1, 1, 1, 2, 1, 0, -1, -2, -3],
            [-6, -4, -2, -2, 0, 0, 1, 1, 2, 1, 0, -1],
            [-7, -5, -3, -1, -1, -1, 0, 2, 1, 1, 0, 1],
        ], $grid);
    }
}
