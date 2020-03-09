<?php

declare(strict_types=1);

use Kogleron\Test12GoAsia\App\Service\Calculator\AvgDestinationCalculator;
use Kogleron\Test12GoAsia\App\Service\Calculator\PointsDistanceCalculator;
use Kogleron\Test12GoAsia\App\Service\Calculator\WorstToAvgDistanceCalculator;
use Kogleron\Test12GoAsia\App\Service\Parser\ActionsParser;
use Kogleron\Test12GoAsia\App\Service\Parser\InputParser;
use Kogleron\Test12GoAsia\App\Service\Parser\RouteParser;
use Kogleron\Test12GoAsia\App\Service\Parser\StartPointParser;

include __DIR__ . '/../vendor/autoload.php';

$input = <<<EOT
3
87.342 34.30 start 0 walk 10.0
2.6762 75.2811 start -45.0 walk 40 turn 40.0 walk 60
58.518 93.508 start 270 walk 50 turn 90 walk 40 turn 13 walk 5
2
30 40 start 90 walk 5
40 50 start 180 walk 10 turn 90 walk 5
0
EOT;

$result = [];
$inputParser = new InputParser($input);
$routeParser = new RouteParser(
    new StartPointParser(),
    new ActionsParser()
);
$avgCalculator = new AvgDestinationCalculator();
$distanceCalculator = new PointsDistanceCalculator();
$worstCalculator = new WorstToAvgDistanceCalculator($avgCalculator, $distanceCalculator);

foreach ($inputParser as $caseRouteLines) {
    $routes = [];
    foreach ($caseRouteLines as $routeLine) {
        $routes[] = $routeParser->getRoute($routeLine);
    }
    $point = $avgCalculator->setRoutes(...$routes)->calculate();

    print sprintf(
            '%s %s %s',
            $point->getX(),
            $point->getY(),
            $worstCalculator->setRoutes(...$routes)->calculate()
        ) . PHP_EOL;
}