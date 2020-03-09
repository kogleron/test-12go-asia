<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\Tests\Service\Calculator;

use Kogleron\Test12GoAsia\App\Service\Calculator\AvgDestinationCalculator;
use Kogleron\Test12GoAsia\App\Service\Calculator\PointsDistanceCalculator;
use Kogleron\Test12GoAsia\App\Service\Calculator\WorstToAvgDistanceCalculator;
use Kogleron\Test12GoAsia\App\Service\Parser\ActionsParser;
use Kogleron\Test12GoAsia\App\Service\Parser\RouteParser;
use Kogleron\Test12GoAsia\App\Service\Parser\StartPointParser;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Kogleron\Test12GoAsia\App\Service\Calculator\WorstToAvgDistanceCalculator
 */
class WorstToAvgDistanceCalculatorTest extends TestCase
{
    /**
     * @covers ::calculate
     * @dataProvider dataCalculate
     * @param array $routeLines
     * @param float $expected
     */
    public function testCalculate(array $routeLines, float $expected): void
    {
        $distanceCalculator = new WorstToAvgDistanceCalculator(
            new AvgDestinationCalculator(),
            new PointsDistanceCalculator()
        );
        $parser = new RouteParser(
            new StartPointParser(),
            new ActionsParser()
        );
        $routes = [];

        foreach ($routeLines as $line) {
            $routes[] = $parser->getRoute($line);
        }

        $distanceCalculator->setRoutes(...$routes);

        $actual = $distanceCalculator->calculate();
        $accuracy = 0.01;

        self::assertTrue(($expected - $accuracy) <= $actual);
        self::assertTrue(($expected + $accuracy) >= $actual);
    }

    /**
     * @return array
     */
    public function dataCalculate(): array
    {
        return [
            [
                [
                    '30 40 start 90 walk 5',
                    '40 50 start 180 walk 10 turn 90 walk 5'
                ],
                0
            ],
            [
                [
                    '87.342 34.30 start 0 walk 10.0',
                    '2.6762 75.2811 start -45.0 walk 40 turn 40.0 walk 60',
                    '58.518 93.508 start 270 walk 50 turn 90 walk 40 turn 13 walk 5'
                ],
                7.63097
            ]
        ];
    }
}
