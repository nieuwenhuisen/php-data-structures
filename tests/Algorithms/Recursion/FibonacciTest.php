<?php

declare(strict_types=1);

namespace App\Tests\Algorithms\Recursion;

use App\Algorithms\Recursion\Fibonacci;
use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase
{
    public function fibonacciData(): array
    {
        return [
          [5, 8],
          [10, 89],
        ];
    }

    /**
     * @dataProvider fibonacciData
     */
    public function testFibonacci(int $factorial, int $expected): void
    {
        $actual = Fibonacci::fibonacci($factorial);
        $this->assertSame($expected, $actual);
    }
}
