<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\App\Service\Calculator;

use Kogleron\Test12GoAsia\App\Model\Route;

/**
 * Class AvgDestinationCalculator
 * @package Kogleron\Test12GoAsia\App\Service\Calculator
 */
class AvgDestinationCalculator
{
    /**
     * @var array|Route[]
     */
    private $routes = [];

    /**
     * @param Route $route
     * @return $this
     */
    public function addRoute(Route $route):self
    {
        $this->routes[] = $route;

        return $this;
    }

    /**
     * @return Route\Point
     */
    public function calculate(): Route\Point
    {
        $xSum = 0;
        $ySum = 0;
        $n = count($this->routes);

        foreach ($this->routes as $route) {
            $point = $route->getEndPoint()->getPoint();
            $xSum += $point->getX();
            $ySum += $point->getY();
        }

        return new Route\Point(
            round($xSum / $n, 4),
            round($ySum / $n, 4)
        );
    }

    /**
     * @param Route ...$routes
     * @return $this
     */
    public function setRoutes(Route ...$routes): self
    {
        $this->routes = $routes;

        return $this;
    }
}