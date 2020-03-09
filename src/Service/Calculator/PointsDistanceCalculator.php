<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\App\Service\Calculator;


use Kogleron\Test12GoAsia\App\Model\Route\Point;

/**
 * Class PointsDistanceCalculator
 * @package Kogleron\Test12GoAsia\App\Service\Calculator
 */
class PointsDistanceCalculator
{
    /**
     * @param Point $a
     * @param Point $b
     * @return float
     */
    public function calculate(Point $a, Point $b): float
    {
        $xOffset = abs($a->getX() - $b->getX());
        $yOffset = abs($a->getY() - $b->getY());

        return sqrt($xOffset * $xOffset + $yOffset * $yOffset);
    }
}