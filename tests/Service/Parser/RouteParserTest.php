<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\Tests\Service\Parser;

use Kogleron\Test12GoAsia\App\Service\Parser\ActionsParser;
use Kogleron\Test12GoAsia\App\Service\Parser\RouteParser;
use Kogleron\Test12GoAsia\App\Service\Parser\StartPointParser;
use Kogleron\Test12GoAsia\App\Model\Route;
use Kogleron\Test12GoAsia\App\Model\Route\Action\Walk;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Kogleron\Test12GoAsia\App\Service\Parser\RouteParser
 */
class RouteParserTest extends TestCase
{
    /**
     * @covers ::getRoute
     */
    public function testGetRoute(): void
    {
        $line = '30 40 start 90 walk 5';
        $parser = new RouteParser(new StartPointParser(), new ActionsParser());
        $actual = $parser->getRoute($line);
        $expected = new Route(
            new Route\DirectedPoint(
                new Route\Point(30, 40),
                new Route\Direction(90)
            )
        );
        $expected->setActions(
            ...[
                   new Walk(5)
               ]
        );

        self::assertEquals($expected, $actual);
    }
}
