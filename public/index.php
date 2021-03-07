<?php
declare(strict_types=1);

setlocale(LC_ALL, "ru_RU.UTF-8");

$app = require_once __DIR__ . "/../bootstrap/container.php";

$routers = require_once __DIR__ . '/../bootstrap/routes.php';
$routers($app);

$app->run();
