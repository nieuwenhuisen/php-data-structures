<?php

namespace App\Tests\Algorithms\Recursion;

use App\Algorithms\Recursion\Factorial;
use PHPUnit\Framework\TestCase;

class FactorialTest extends TestCase
{
    public function factorialData(): array
    {
        return [
          [5, 120],
          [10, 3628800],
        ];
    }

    /**
     * @dataProvider factorialData
     * @param int $factorial
     * @param int $expected
     */
    public function testFactorial(int $factorial, int $expected): void
    {
        $actual = Factorial::factorial($factorial);
        $this->assertEquals($expected, $actual);
    }
}
