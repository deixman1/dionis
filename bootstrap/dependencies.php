<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

return static function (ContainerBuilder $containerBuilder) {
    // Определение всех библиотечных зависимостей
    $containerBuilder->addDefinitions(
        [
            LoggerInterface::class => static function (ContainerInterface $c) {

                $logger = new Logger(LOGGER_NAME);

                $handler = new StreamHandler(LOGGER_PATH, LOGGER_LEVEL);
                $logger->pushHandler($handler);

                return $logger;
            }
        ]
    );
};

