<?php

declare(strict_types=1);

namespace Helper\Essential\Stubs\Api\Request;


class EventActionRequestStubs
{
    public static function getDataEventConfirmation(): array
    {
        return [
            'type' => 'confirmation'
        ];
    }
}
