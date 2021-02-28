<?php
declare(strict_types=1);

use Slim\App;
use SRC\Application\Actions\VK\EventAction;

return static function (App $app) {
    $app->get(
        '/api', EventAction::class
    );
};
