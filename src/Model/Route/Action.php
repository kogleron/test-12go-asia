<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\App\Model\Route;

abstract class Action
{
    abstract public function applyOn(DirectedPoint $directedPoint): DirectedPoint;
}