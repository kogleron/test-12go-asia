<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\Tests\Model;

use Kogleron\Test12GoAsia\App\Model\Route;
use Kogleron\Test12GoAsia\App\Service\Parser\ActionsParser;
use Kogleron\Test12GoAsia\App\Service\Parser\RouteParser;
use Kogleron\Test12GoAsia\App\Service\Parser\StartPointParser;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Kogleron\Test12GoAsia\App\Model\Route
 */
class RouteTest extends TestCase
{
    /**
     * @covers ::getEndPoint
     * @dataProvider dataGetEndPoint
     * @param string $line
     * @param Route\DirectedPoint $expected
     */
    public function testGetEndPoint(string $line, Route\DirectedPoint $expected): void
    {
        $parser = new RouteParser(new StartPointParser(), new ActionsParser());
        $route = $parser->getRoute($line);
        $actual = $route->getEndPoint();

        self::assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function dataGetEndPoint(): array
    {
        return [
            [
                '30 40 start 90 walk 5',
                new Route\DirectedPoint(
                    new Route\Point(30, 45),
                    new Route\Direction(90)
                )
            ],
            [
                '40 50 start 180 walk 10 turn 90 walk 5',
                new Route\DirectedPoint(
                    new Route\Point(30, 45),
                    new Route\Direction(270)
                )
            ],
            [
                '87.342 34.30 start 0 walk 10.0',
                new Route\DirectedPoint(
                    new Route\Point(97.342, 34.30),
                    new Route\Direction(0)
                )
            ],
            [
                '58.518 93.508 start 270 walk 50 turn 90 walk 40',
                new Route\DirectedPoint(
                    new Route\Point(98.518, 43.508),
                    new Route\Direction(0)
                )
            ],
        ];
    }
}
