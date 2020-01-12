<?php

declare(strict_types=1);

namespace App\Algorithms\Puzzle;

final class Sudoku
{
    private const NUMBERS = 9;
    private const UNASSIGNED = 0;

    private static function findUnassignedLocation(array &$grid, int &$row, int &$column): bool
    {
        for ($row = 0; $row < self::NUMBERS; ++$row) {
            for ($column = 0; $column < self::NUMBERS; ++$column) {
                if (self::UNASSIGNED === $grid[$row][$column]) {
                    return true;
                }
            }
        }

        return false;
    }

    private static function usedInRow(array &$grid, int $row, int $number): bool
    {
        return \in_array($number, $grid[$row], true);
    }

    private static function usedInColumn(array &$grid, int $column, int $number): bool
    {
        return \in_array($number, array_column($grid, $column), true);
    }

    private static function usedInBox(array &$grid, int $boxStartRow, int $boxStartCol, int $number): bool
    {
        for ($row = 0; $row < 3; ++$row) {
            for ($column = 0; $column < 3; ++$column) {
                if ($grid[$row + $boxStartRow][$column + $boxStartCol] === $number) {
                    return true;
                }
            }
        }

        return false;
    }

    private static function isSafe(array $grid, int $row, int $column, int $number): bool
    {
        return !self::usedInRow($grid, $row, $number) &&
            !self::usedInColumn($grid, $column, $number) &&
            !self::usedInBox($grid, $row - $row % 3, $column - $column % 3, $number);
    }

    public static function solve(array &$grid): bool
    {
        $row = $column = 0;

        if (!self::findUnassignedLocation($grid, $row, $column)) {
            return true; // success! no empty space
        }

        for ($number = 1; $number <= self::NUMBERS; ++$number) {
            if (self::isSafe($grid, $row, $column, $number)) {
                $grid[$row][$column] = $number; // make assignment

                if (self::solve($grid)) {
                    return true;
                }

                $grid[$row][$column] = self::UNASSIGNED;
            }
        }

        return false;
    }
}
