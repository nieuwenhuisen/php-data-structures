<?php

namespace App\DataStructures\Stack;

use UnderflowException;

class ExpressionChecker
{
    public const GROUPS = [
        '(' => ')',
        '{' => '}',
        '[' => ']',
    ];

    /**
     * Check an expression on correctness.
     * For example:
     * correct: 8 * (9 -2) + { (4 * 5) / ( 2 * 2) }
     * wrong: 5 * 8 * 9 / ( 3 * 2 ) ).
     */
    public static function check(string $expression): bool
    {
        $stack = new ArrayStack(0);

        for ($i = 0, $length = mb_strlen($expression); $i < $length; ++$i) {
            $char = $expression[$i];

            // If a new group is started
            if (isset(self::GROUPS[$char])) {
                $stack->push($char);
                continue;
            }

            if (\in_array($char, self::GROUPS, true)) {
                try {
                    $last = $stack->pop();
                    if (self::GROUPS[$last] !== $char) {
                        return false;
                    }
                } catch (UnderflowException $exception) {
                    return false;
                }
            }
        }

        return $stack->isEmpty();
    }
}
