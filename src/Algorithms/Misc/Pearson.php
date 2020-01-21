<?php

declare(strict_types=1);

namespace App\Algorithms\Misc;

final class Pearson
{
    private static function calculateScore(array $reviews, string $person1, string $person2): float
    {
        $commonItems = [];

        foreach ($reviews[$person1] as $restaurant1 => $rating) {
            foreach ($reviews[$person2] as $restaurant2 => $rating) {
                if ($restaurant1 === $restaurant2) {
                    $commonItems[$restaurant1] = 1;
                }
            }
        }

        $items = \count($commonItems);

        if (0 === $items) {
            return 0.0;
        }

        $sum1 = $sum2 = $sqrSum1 = $sqrSum2 = $pSum = 0;

        foreach ($commonItems as $restaurant => $common) {
            $sum1 += $reviews[$person1][$restaurant];
            $sum2 += $reviews[$person2][$restaurant];
            $sqrSum1 += $reviews[$person1][$restaurant] ** 2;
            $sqrSum2 += $reviews[$person2][$restaurant] ** 2;
            $pSum += $reviews[$person1][$restaurant] * $reviews[$person2][$restaurant];
        }

        $num = $pSum - (($sum1 * $sum2) / $items);
        $den = sqrt(($sqrSum1 - (($sum1 ** 2) / $items)) * ($sqrSum2 - (($sum2 ** 2) / $items)));

        if (0 === $den) {
            $pearsonCorrelation = 0;
        } else {
            $pearsonCorrelation = $num / $den;
        }

        return (float) $pearsonCorrelation;
    }

    public static function getRecommendations(array $reviews, string $person): array
    {
        $calculation = [];

        foreach ($reviews as $reviewer => $restaurants) {
            $similarityScore = self::calculateScore($reviews, $person, $reviewer);

            if ($person === $reviewer || $similarityScore <= 0) {
                continue;
            }

            foreach ($restaurants as $restaurant => $rating) {
                if (!\array_key_exists($restaurant, $reviews[$person])) {
                    if (!\array_key_exists($restaurant, $calculation)) {
                        $calculation[$restaurant] = [];
                        $calculation[$restaurant]['Total'] = 0;
                        $calculation[$restaurant]['SimilarityTotal'] = 0;
                    }

                    $calculation[$restaurant]['Total'] += $similarityScore * $rating;
                    $calculation[$restaurant]['SimilarityTotal'] += $similarityScore;
                }
            }
        }

        $recommendations = [];
        foreach ($calculation as $restaurant => $values) {
            $recommendations[$restaurant] = $calculation[$restaurant]['Total'] / $calculation[$restaurant]['SimilarityTotal'];
        }

        arsort($recommendations);

        return $recommendations;
    }
}
