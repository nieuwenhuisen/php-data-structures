<?php

namespace App\Tests\Algorithms\Recursion;

use App\Algorithms\Recursion\GreatestCommonDivision;
use PHPUnit\Framework\TestCase;

class GreatestCommonDivisionTest extends TestCase
{
    public function greatestCommonDivisionData(): array
    {
        return [
          [10, 15, 5],
          [10, 60, 10],
        ];
    }

    /**
     * @dataProvider greatestCommonDivisionData
     * @param int $a
     * @param int $b
     * @param int $expected
     */
    public function testGreatestCommonDivision(int $a, int $b, int $expected): void
    {
        $actual = GreatestCommonDivision::gcd($a, $b);
        $this->assertEquals($expected, $actual);
    }
}
