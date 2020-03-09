<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\Tests\Model\Route\Action;

use Kogleron\Test12GoAsia\App\Model\Route\Action\Walk;
use Kogleron\Test12GoAsia\App\Model\Route\DirectedPoint;
use Kogleron\Test12GoAsia\App\Model\Route\Direction;
use Kogleron\Test12GoAsia\App\Model\Route\Point;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Kogleron\Test12GoAsia\App\Model\Route\Action\Walk
 */
class WalkTest extends TestCase
{
    /**
     * @covers ::applyOn
     * @dataProvider dataApplyOn
     * @param Walk $walk
     * @param DirectedPoint $directedPoint
     * @param DirectedPoint $expected
     */
    public function testApplyOn(Walk $walk, DirectedPoint $directedPoint, DirectedPoint $expected): void
    {
        self::assertEquals(
            $expected,
            $walk->applyOn($directedPoint)
        );
    }

    public function dataApplyOn()
    {
        return [
            0 => [
                new Walk(5),
                new DirectedPoint(
                    new Point(30, 40),
                    new Direction(90)
                ),
                new DirectedPoint(
                    new Point(30, 45),
                    new Direction(90)
                )
            ],
        ];
    }
}
