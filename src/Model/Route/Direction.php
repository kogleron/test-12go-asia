<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\App\Model\Route;

class Direction
{
    /**
     * @var float
     */
    private $degrees;

    public function __construct(float $degrees)
    {
        $this->degrees = $degrees;
    }

    /**
     * @return float
     */
    public function getDegrees(): float
    {
        return $this->degrees;
    }
}