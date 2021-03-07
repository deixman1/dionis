<?php

use Psr\Container\ContainerInterface;

function setUpDi(): ContainerInterface
{
    $app = require_once __DIR__ . '/../bootstrap/container.php';
    /** @var Slim\App $app */

    return $app->getContainer();
}
