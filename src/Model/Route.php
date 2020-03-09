<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\App\Model;


use Kogleron\Test12GoAsia\App\Model\Route\Action;
use Kogleron\Test12GoAsia\App\Model\Route\DirectedPoint;

/**
 * Class Route
 * @package Kogleron\Test12GoAsia\App\Model
 */
class Route
{
    /**
     * @var DirectedPoint
     */
    private $startPoint;
    /**
     * @var Action[]
     */
    private $actions;

    /**
     * Route constructor.
     * @param DirectedPoint $startPoint
     */
    public function __construct(DirectedPoint $startPoint)
    {
        $this->startPoint = $startPoint;
    }

    /**
     * @param Action ...$actions
     * @return $this
     */
    public function setActions(Action ...$actions): self
    {
        $this->actions = $actions;

        return $this;
    }

    /**
     * @return DirectedPoint
     */
    public function getEndPoint(): DirectedPoint
    {
        $endPoint = $this->startPoint;
        foreach ($this->actions as $action) {
            $endPoint = $action->applyOn($endPoint);
        }

        return $endPoint;
    }
}