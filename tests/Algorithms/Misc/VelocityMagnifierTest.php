<?php

declare(strict_types=1);

namespace App\Tests\Algorithms\Misc;

use App\Algorithms\Misc\VelocityMagnifier;
use PHPUnit\Framework\TestCase;

final class VelocityMagnifierTest extends TestCase
{
    public function testMagnifier(): void
    {
        $jobs = [
            ['id' => 'S1', 'deadline' => 2, 'velocity' => 95],
            ['id' => 'S2', 'deadline' => 1, 'velocity' => 32],
            ['id' => 'S3', 'deadline' => 2, 'velocity' => 47],
            ['id' => 'S4', 'deadline' => 1, 'velocity' => 42],
            ['id' => 'S5', 'deadline' => 3, 'velocity' => 28],
            ['id' => 'S6', 'deadline' => 4, 'velocity' => 64],
        ];

        $result = VelocityMagnifier::magnifier($jobs);

        $this->assertSame(234, $result);
    }
}
