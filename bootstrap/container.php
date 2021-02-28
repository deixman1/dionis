<?php

$builder = new \DI\ContainerBuilder();

$builder->useAnnotations(false);
$builder->useAutowiring(false);

$builder->addDefinitions(__DIR__ . 'dependencies.php');