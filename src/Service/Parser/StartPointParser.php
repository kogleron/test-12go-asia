<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\App\Service\Parser;


use Kogleron\Test12GoAsia\App\Model\Route\DirectedPoint;
use Kogleron\Test12GoAsia\App\Model\Route\Direction;
use Kogleron\Test12GoAsia\App\Model\Route\Point;

class StartPointParser
{
    public function getDirectedPoint(string $line): DirectedPoint
    {
        if (!preg_match('/^([\d.\-]+)\s([\d.\-]+)\sstart\s([\d.\-]+)/', $line, $matches)) {
            throw new \RuntimeException('Need start point: ' . $line);
        }

        return new DirectedPoint(
            new Point((float)$matches[1], (float)$matches[2]),
            new Direction((int)$matches[3])
        );
    }
}