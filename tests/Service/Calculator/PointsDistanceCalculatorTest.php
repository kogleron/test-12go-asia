<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\Tests\Service\Calculator;

use Kogleron\Test12GoAsia\App\Model\Route\Point;
use Kogleron\Test12GoAsia\App\Service\Calculator\PointsDistanceCalculator;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Kogleron\Test12GoAsia\App\Service\Calculator\PointsDistanceCalculator
 */
class PointsDistanceCalculatorTest extends TestCase
{
    /**
     * @covers ::calculate
     * @dataProvider dataCalculate
     * @param Point $a
     * @param Point $b
     * @param float $expected
     */
    public function testCalculate(Point $a, Point $b, float $expected): void
    {
        $calculator = new PointsDistanceCalculator();

        self::assertEquals(
            $expected,
            $calculator->calculate($a, $b)
        );
    }

    /**
     * @return array
     */
    public function dataCalculate(): array
    {
        return [
            [
                new Point(10, 12),
                new Point(13, 16),
                5
            ]
        ];
    }
}
