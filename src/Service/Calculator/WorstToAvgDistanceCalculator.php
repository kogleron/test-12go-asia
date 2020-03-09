<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\App\Service\Calculator;

use Kogleron\Test12GoAsia\App\Model\Route;

/**
 * Class WorstToAvgDistanceCalculator
 * @package Kogleron\Test12GoAsia\App\Service\Calculator
 */
class WorstToAvgDistanceCalculator
{
    /**
     * @var AvgDestinationCalculator
     */
    private $avgDestinationCalculator;
    /**
     * @var Route[]
     */
    private $routes;
    /**
     * @var PointsDistanceCalculator
     */
    private $pointsDistanceCalculator;

    /**
     * WorstToAvgDistanceCalculator constructor.
     * @param AvgDestinationCalculator $avgDestinationCalculator
     * @param PointsDistanceCalculator $pointsDistanceCalculator
     */
    public function __construct(
        AvgDestinationCalculator $avgDestinationCalculator,
        PointsDistanceCalculator $pointsDistanceCalculator
    ) {
        $this->avgDestinationCalculator = $avgDestinationCalculator;
        $this->pointsDistanceCalculator = $pointsDistanceCalculator;
    }

    /**
     * @return float
     */
    public function calculate(): float
    {
        $avgPoint = $this->avgDestinationCalculator->setRoutes(...$this->routes)->calculate();
        $maxDistance = 0;

        foreach ($this->routes as $route) {
            $endPoint = $route->getEndPoint()->getPoint();
            $distance = $this->pointsDistanceCalculator->calculate($avgPoint, $endPoint);

            if ($distance > $maxDistance) {
                $maxDistance = $distance;
            }
        }

        return $maxDistance;
    }

    /**
     * @param Route ...$routes
     * @return WorstToAvgDistanceCalculator
     */
    public function setRoutes(Route  ...$routes): self
    {
        $this->routes = $routes;

        return $this;
    }
}