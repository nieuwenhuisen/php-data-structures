<?php

declare(strict_types=1);

namespace App\Tests\Algorithms\Misc;

use App\Algorithms\Misc\KnapSack;
use PHPUnit\Framework\TestCase;

final class KnapSackTest extends TestCase
{
    public function testGetMaxValue(): void
    {
        $values = [10, 20, 30, 40, 50];
        $weights = [1, 2, 3, 4, 5];
        $maxWeight = 10;

        $knapsack = KnapSack::getMaxValue(
            $maxWeight,
            $weights,
            $values
        );

        $this->assertSame(
            $knapsack,
            100
        );
    }
}
