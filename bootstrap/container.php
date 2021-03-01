<?php

$builder = new \DI\ContainerBuilder();

$builder->useAnnotations(false);
$builder->useAutowiring(false);

$dependencies = require_once __DIR__ . 'dependencies.php';
$dependencies($builder);
$routers = require_once __DIR__ . 'routes.php';
$routers($builder);