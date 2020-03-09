<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\App\Model\Route;


/**
 * Class Point
 * @package Kogleron\Test12GoAsia\App\Model\Route
 */
class Point
{
    /**
     * @var float
     */
    private $x;
    /**
     * @var float
     */
    private $y;

    /**
     * Point constructor.
     * @param float $x
     * @param float $y
     */
    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return float
     */
    public function getX(): float
    {
        return $this->x;
    }

    /**
     * @return float
     */
    public function getY(): float
    {
        return $this->y;
    }
}