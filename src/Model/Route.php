<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\App\Model;


use Kogleron\Test12GoAsia\App\Model\Route\Action;
use Kogleron\Test12GoAsia\App\Model\Route\DirectedPoint;

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

    public function __construct(DirectedPoint $startPoint)
    {
        $this->startPoint = $startPoint;
    }

    public function setActions(Action ...$actions): self
    {
        $this->actions = $actions;

        return $this;
    }

    public function getEndPoint(): DirectedPoint
    {
        $endPoint = $this->startPoint;
        foreach ($this->actions as $action) {
            $endPoint = $action->applyOn($endPoint);
        }

        return $endPoint;
    }
}