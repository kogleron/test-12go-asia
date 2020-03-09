<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\App\Service\Parser;


use Kogleron\Test12GoAsia\App\Model\Route;

/**
 * Class RouteParser
 * @package Kogleron\Test12GoAsia\App\Service\Parser
 */
class RouteParser
{
    /**
     * @var StartPointParser
     */
    private $startPointParser;
    /**
     * @var ActionsParser
     */
    private $actionsParser;

    /**
     * RouteParser constructor.
     * @param StartPointParser $startPointParser
     * @param ActionsParser $actionsParser
     */
    public function __construct(StartPointParser $startPointParser, ActionsParser $actionsParser)
    {
        $this->startPointParser = $startPointParser;
        $this->actionsParser = $actionsParser;
    }

    /**
     * @param string $line
     * @return Route
     */
    public function getRoute(string $line): Route
    {
        $route = new Route($this->startPointParser->getDirectedPoint($line));
        $route->setActions(...$this->actionsParser->getActions($line));

        return $route;
    }
}