<?php

require_once __DIR__ . "/../vendor/autoload.php";

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

$builder = new ContainerBuilder;

$builder->useAnnotations(false);
$builder->useAutowiring(false);

$dependencies = include __DIR__ . '/dependencies.php';
$dependencies($builder);

$container = $builder->build();

AppFactory::setContainer($container);
return AppFactory::create();