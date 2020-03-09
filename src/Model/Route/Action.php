<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\App\Model\Route;

/**
 * Class Action
 * @package Kogleron\Test12GoAsia\App\Model\Route
 */
abstract class Action
{
    /**
     * @param DirectedPoint $directedPoint
     * @return DirectedPoint
     */
    abstract public function applyOn(DirectedPoint $directedPoint): DirectedPoint;
}