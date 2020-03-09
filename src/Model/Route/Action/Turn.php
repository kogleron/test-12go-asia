<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\App\Model\Route\Action;

use Kogleron\Test12GoAsia\App\Model\Route\Action;
use Kogleron\Test12GoAsia\App\Model\Route\DirectedPoint;
use Kogleron\Test12GoAsia\App\Model\Route\Direction;

/**
 * Class Turn
 * @package Kogleron\Test12GoAsia\App\Model\Route\Action
 */
class Turn extends Action
{
    /**
     * @var float
     */
    private $degrees;

    /**
     * Turn constructor.
     * @param float $degrees
     */
    public function __construct(float $degrees)
    {
        $this->degrees = $degrees;
    }

    /**
     * @param DirectedPoint $directedPoint
     * @return DirectedPoint
     */
    public function applyOn(DirectedPoint $directedPoint): DirectedPoint
    {
        return new DirectedPoint(
            $directedPoint->getPoint(),
            new Direction(($directedPoint->getDirection()->getDegrees() + $this->degrees) % 360)
        );
    }
}