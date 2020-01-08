<?php

declare(strict_types=1);

namespace App\Tests\Algorithms\String;

use App\Algorithms\String\PatternMatching;
use PHPUnit\Framework\TestCase;

final class PatternMatchingTest extends TestCase
{
    public function testFindAll(): void
    {
        $matches = PatternMatching::findAll('AABA', 'AABAACAADAABABBBAABAA');
        $this->assertCount(3, $matches);
        $this->assertSame(
            [0, 9, 16],
            $matches
        );
    }
}
