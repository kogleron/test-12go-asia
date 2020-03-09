<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\App\Model\Route;

/**
 * Class DirectedPoint
 * @package Kogleron\Test12GoAsia\App\Model\Route
 */
class DirectedPoint
{
    /**
     * @var Point
     */
    private $point;
    /**
     * @var Direction
     */
    private $direction;

    /**
     * DirectedPoint constructor.
     * @param Point $point
     * @param Direction $direction
     */
    public function __construct(Point $point, Direction $direction)
    {
        $this->point = $point;
        $this->direction = $direction;
    }

    /**
     * @return Point
     */
    public function getPoint(): Point
    {
        return $this->point;
    }

    /**
     * @return Direction
     */
    public function getDirection(): Direction
    {
        return $this->direction;
    }
}