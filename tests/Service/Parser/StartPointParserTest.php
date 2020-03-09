<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\Tests\Service\Parser;

use Kogleron\Test12GoAsia\App\Service\Parser\StartPointParser;
use Kogleron\Test12GoAsia\App\Model\Route\DirectedPoint;
use Kogleron\Test12GoAsia\App\Model\Route\Direction;
use Kogleron\Test12GoAsia\App\Model\Route\Point;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Kogleron\Test12GoAsia\App\Service\Parser\StartPointParser
 */
class StartPointParserTest extends TestCase
{
    /**
     * @covers ::getDirectedPoint
     */
    public function testGetPoint(): void
    {
        $line = '30 40 start 90 walk 5';
        $parser = new StartPointParser();
        $actual = $parser->getDirectedPoint($line);
        $expected = new DirectedPoint(new Point(30, 40), new Direction(90));

        self::assertEquals($expected, $actual);
    }
}
