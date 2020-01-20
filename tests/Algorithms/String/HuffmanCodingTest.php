<?php

declare(strict_types=1);

namespace App\Tests\Algorithms\String;

use App\Algorithms\String\HuffmanCoding;
use PHPUnit\Framework\TestCase;

final class HuffmanCodingTest extends TestCase
{
    public function testEncode()
    {
        $txt = 'PHP 7 Data structures and Algorithms';
        $symbols = array_count_values(mb_str_split($txt));

        $result = HuffmanCoding::encode($symbols);

        $this->assertSame([
            'i' => '00000',
            'D' => '00001',
            'd' => '00010',
            'A' => '00011',
            't' => '001',
            'H' => '01000',
            'm' => '01001',
            'P' => '0101',
            'g' => '01100',
            'o' => '01101',
            'e' => '01110',
            'n' => '01111',
            7 => '10000',
            'l' => '10001',
            'u' => '1001',
            ' ' => '101',
            'h' => '11000',
            'c' => '11001',
            'a' => '1101',
            'r' => '1110',
            's' => '1111',
        ], $result);
    }
}
