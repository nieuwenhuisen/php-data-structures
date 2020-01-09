<?php

declare(strict_types=1);

namespace App\Tests\Algorithms\String;

use App\Algorithms\String\KnuthMorrisPrattPatternMatching;
use PHPUnit\Framework\TestCase;

final class KnuthMorrisPrattPatternMatchingTest extends TestCase
{
    public function testStringMatching(): void
    {
        $matches = KnuthMorrisPrattPatternMatching::stringMatching('AABA', 'AABAACAADAABABBBAABAA');

        $this->assertCount(3, $matches);
        $this->assertSame(
            [0, 9, 16],
            $matches
        );
    }
}
