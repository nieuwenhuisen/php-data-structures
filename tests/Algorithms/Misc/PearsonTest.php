<?php

declare(strict_types=1);

namespace App\Tests\Algorithms\Misc;

use App\Algorithms\Misc\Pearson;
use PHPUnit\Framework\TestCase;

final class PearsonTest extends TestCase
{
    public function testCalculateScore(): void
    {
        $reviews = [
            'Adiyan' => ['McDonalds' => 5, 'KFC' => 5, 'Pizza Hut' => 4.5, 'Burger King' => 4.7, 'American Burger' => 3.5, 'Pizza Roma' => 2.5],
            'Mikhael' => ['McDonalds' => 3, 'KFC' => 4, 'Pizza Hut' => 3.5, 'Burger King' => 4, 'American Burger' => 4, 'Jafran' => 4],
            'Zayeed' => ['McDonalds' => 5, 'KFC' => 4, 'Pizza Hut' => 2.5, 'Burger King' => 4.5, 'American Burger' => 3.5, 'Sbarro' => 2],
            'Arush' => ['KFC' => 4.5, 'Pizza Hut' => 3, 'Burger King' => 4, 'American Burger' => 3, 'Jafran' => 2.5, 'FFC' => 3.5],
            'Tajwar' => ['Burger King' => 3, 'American Burger' => 2, 'KFC' => 2.5, 'Pizza Hut' => 3, 'Pizza Roma' => 2.5, 'FFC' => 3],
            'Aayan' => ['KFC' => 5, 'Pizza Hut' => 4, 'Pizza Roma' => 4.5, 'FFC' => 4],
        ];

        $result = Pearson::getRecommendations($reviews, 'Arush');

        $this->assertSame([
            'McDonalds',
            'Pizza Roma',
            'Sbarro',
        ], array_keys($result));
    }
}
