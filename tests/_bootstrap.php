<?php

use Psr\Container\ContainerInterface;

function getContainer(): ContainerInterface
{
    $app = require __DIR__ . '/../bootstrap/container.php'; //TODO Вернуть предыдущее состояние

    /** @var Slim\App $app */
    return $app->getContainer();
}
