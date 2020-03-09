<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\App\Model\Route\Action;

use Kogleron\Test12GoAsia\App\Model\Route\Action;
use Kogleron\Test12GoAsia\App\Model\Route\DirectedPoint;
use Kogleron\Test12GoAsia\App\Model\Route\Direction;

class Turn extends Action
{
    /**
     * @var float
     */
    private $degrees;

    public function __construct(float $degrees)
    {
        $this->degrees = $degrees;
    }

    public function applyOn(DirectedPoint $directedPoint): DirectedPoint
    {
        return new DirectedPoint(
            $directedPoint->getPoint(),
            new Direction(($directedPoint->getDirection()->getDegrees() + $this->degrees) % 360)
        );
    }
}