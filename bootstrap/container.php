<?php

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . "/../config/buttons.php";

$builder = new ContainerBuilder;

$builder->useAnnotations(false);
$builder->useAutowiring(true);
// Set up dependencies
$dependencies = include __DIR__ . '/dependencies.php';
$dependencies($builder);

$container = $builder->build();

AppFactory::setContainer($container);
return AppFactory::create();