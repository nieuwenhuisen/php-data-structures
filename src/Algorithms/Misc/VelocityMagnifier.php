<?php

declare(strict_types=1);

namespace App\Algorithms\Misc;

final class VelocityMagnifier
{
    public static function magnifier(array $jobs): int
    {
        $count = \count($jobs);

        usort($jobs, static function ($job1, $job2) {
            return $job1['velocity'] < $job2['velocity'];
        });

        $max = max(array_column($jobs, 'deadline'));

        $slot = array_fill(1, $max, -1);
        $filledTimeSlot = 0;

        for ($i = 0; $i < $count; ++$i) {
            $k = min($max, $jobs[$i]['deadline']);

            while ($k >= 1) {
                if (-1 === $slot[$k]) {
                    $slot[$k] = $i;
                    ++$filledTimeSlot;
                    break;
                }
                --$k;
            }

            if ($filledTimeSlot === $max) {
                break;
            }
        }

        $maxVelocity = 0;

        for ($i = 1; $i <= $max; ++$i) {
            $maxVelocity += $jobs[$slot[$i]]['velocity'];
        }

        return $maxVelocity;
    }
}
