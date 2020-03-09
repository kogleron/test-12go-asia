<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\Tests\Service\Parser;

use Kogleron\Test12GoAsia\App\Service\Parser\ActionsParser;
use Kogleron\Test12GoAsia\App\Model\Route\Action\Turn;
use Kogleron\Test12GoAsia\App\Model\Route\Action\Walk;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Kogleron\Test12GoAsia\App\Service\Parser\ActionsParser
 */
class ActionsParserTest extends TestCase
{
    /**
     * @covers ::getActions
     */
    public function testGetActions(): void
    {
        $line = '30 40 start 90 walk 5 turn 20 walk 10 walk 5 turn 10';
        $parser = new ActionsParser();
        $actual = $parser->getActions($line);
        $expected = [
            new Walk(5),
            new Turn(20),
            new Walk(10),
            new Walk(5),
            new Turn(10)
        ];

        self::assertEquals($expected, $actual);
    }
}
