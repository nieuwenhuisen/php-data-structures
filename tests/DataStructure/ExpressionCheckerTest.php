<?php

namespace App\DataStructure\Tests;

use App\DataStructure\Stack\ExpressionChecker;
use PHPUnit\Framework\TestCase;

class ExpressionCheckerTest extends TestCase
{
    public function expressionsData(): array
    {
        return [
            ['8 * (9 -2) + { (4 * 5) / ( 2 * 2) }', true],
            ['5 * 8 * 9 / ( 3 * 2 ) )', false],
            ['[{ (2 * 7) + ( 15 - 3) ]', false],
            ['8 * (9 - 2}', false],
            ['8 * (9 - 2', false],
        ];
    }

    /**
     * @dataProvider expressionsData
     * @param string $expression
     * @param bool $expectedResult
     */
    public function testCheck(string $expression, bool $expectedResult): void
    {
        $result = ExpressionChecker::check($expression);
        $this->assertEquals($expectedResult, $result);
    }
}
