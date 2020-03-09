<?php

declare(strict_types=1);

namespace Kogleron\Test12GoAsia\App\Service\Parser;

use Kogleron\Test12GoAsia\App\Model\Route\Action;
use RuntimeException;

class ActionsParser
{
    /**
     * @param string $line
     * @return array|Action[]
     */
    public function getActions(string $line): array
    {
        $actions = [];

        if (!preg_match_all('/(walk|turn)\s([\d.\-]+)/', $line, $matches)) {
            return [];
        }

        foreach ($matches[1] as $i => $actionName) {
            switch ($actionName) {
                case 'walk':
                    $actions[] = new Action\Walk((float)$matches[2][$i]);
                    break;
                case 'turn':
                    $actions[] = new Action\Turn((float)$matches[2][$i]);
                    break;
                default:
                    throw new RuntimeException('Unknown action: ' . $actionName);
            }
        }

        return $actions;
    }
}