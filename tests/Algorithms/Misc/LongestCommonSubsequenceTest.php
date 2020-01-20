<?php

declare(strict_types=1);

namespace App\Tests\Algorithms\Misc;

use App\Algorithms\Misc\LongestCommonSubsequence;
use PHPUnit\Framework\TestCase;

final class LongestCommonSubsequenceTest extends TestCase
{
    public function testLength()
    {
        $x = 'AGGTAB';
        $y = 'GGTXAYB';
        $result = LongestCommonSubsequence::length($x, $y);

        $this->assertSame(
            $result,
            5
        );
    }
}
