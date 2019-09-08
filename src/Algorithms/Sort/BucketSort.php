<?php

namespace App\Algorithms\Sort;

class BucketSort
{
    public static function sort(array &$input)
    {
        $inputCount = \count($input);

        if ($inputCount <= 0) {
            return;
        }

        $min = min($input);
        $max = max($input);
        $bucketLength = $max - $min + 1;

        $bucket = array_fill(0, (int) $bucketLength, []);

        for ($i = 0; $i < $inputCount; ++$i) {
            $bucket[$input[$i] - $min][] = $input[$i];
        }

        $k = 0;

        for ($i = 0; $i < $bucketLength; ++$i) {
            $bucketCount = \count($bucket[$i]);

            for ($j = 0; $j < $bucketCount; ++$j) {
                $input[$k] = $bucket[$i][$j];
                ++$k;
            }
        }

        return $input;
    }
}
