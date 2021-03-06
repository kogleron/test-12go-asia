<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\Tests\Model\Route\Action;

use Kogleron\Test12GoAsia\App\Model\Route\Action\Turn;
use Kogleron\Test12GoAsia\App\Model\Route\DirectedPoint;
use Kogleron\Test12GoAsia\App\Model\Route\Direction;
use Kogleron\Test12GoAsia\App\Model\Route\Point;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Kogleron\Test12GoAsia\App\Model\Route\Action\Turn
 */
class TurnTest extends TestCase
{
    /**
     * @covers ::applyOn
     * @dataProvider dataApplyOn
     * @param float $startDegrees
     * @param float $turnDegrees
     * @param float $expectedDegrees
     */
    public function testApplyOn(float $startDegrees, float $turnDegrees, float $expectedDegrees): void
    {
        $directedPoint = new DirectedPoint(
            new Point(0, 0),
            new Direction($startDegrees)
        );
        $turn = new Turn($turnDegrees);

        self::assertEquals(
            $expectedDegrees,
            $turn->applyOn($directedPoint)->getDirection()->getDegrees()
        );
    }

    /**
     * @return array
     */
    public function dataApplyOn(): array
    {
        return [
            [
                180,
                90,
                270
            ],
            [
                270,
                90,
                0
            ],
            [
                270,
                180,
                90
            ],
            [
                270,
                -90,
                180
            ]
        ];
    }
}
