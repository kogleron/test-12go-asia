<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\App\Service\Parser;

use Iterator;
use RuntimeException;

/**
 * Class InputParser
 * @package Kogleron\Test12GoAsia\App\Service\Parser
 */
class InputParser implements Iterator
{
    private $position = 0;
    private $cases;

    /**
     * InputParser constructor.
     * @param string $input
     */
    public function __construct(string $input)
    {
        $this->cases = $this->parse($input);
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return $this->cases[$this->position];
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        return isset($this->cases[$this->position]);
    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @param string $input
     * @return array
     */
    private function parse(string $input): array
    {
        $result = [];
        $currentCase = null;
        $routesNum = 0;
        foreach (explode(PHP_EOL, $input) as $line) {
            $line = trim($line);
            if (is_numeric($line)) {
                if ($routesNum && $routesNum !== count($currentCase)) {
                    throw new RuntimeException('Invalid input format: ' . $line);
                }
                if ($currentCase) {
                    $result[] = $currentCase;
                }
                $routesNum = (int)$line;
                if (!$routesNum) {
                    break;
                }
                $currentCase = [];
            } else {
                $currentCase[] = $line;
            }
        }
        return $result;
    }
}