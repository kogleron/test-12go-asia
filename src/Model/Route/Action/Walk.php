<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\App\Model\Route\Action;

use Kogleron\Test12GoAsia\App\Model\Route\Action;
use Kogleron\Test12GoAsia\App\Model\Route\DirectedPoint;
use Kogleron\Test12GoAsia\App\Model\Route\Point;

/**
 * Class Walk
 * @package Kogleron\Test12GoAsia\App\Model\Route\Action
 */
class Walk extends Action
{
    /**
     * @var float
     */
    private $units;

    /**
     * Walk constructor.
     * @param float $units
     */
    public function __construct(float $units)
    {
        $this->units = $units;
    }

    /**
     * @param DirectedPoint $directedPoint
     * @return DirectedPoint
     */
    public function applyOn(DirectedPoint $directedPoint): DirectedPoint
    {
        $point = $directedPoint->getPoint();
        $degrees = $directedPoint->getDirection()->getDegrees();
        $rads = deg2rad($degrees ?: 360);
        $yOffset = sin($rads) * $this->units;
        $xOffset = $yOffset / tan($rads);

        return new DirectedPoint(
            new Point(
                $point->getX() + $xOffset,
                $point->getY() + $yOffset
            ),
            $directedPoint->getDirection()
        );
    }
}