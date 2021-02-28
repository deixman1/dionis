<?php

namespace SRC\Domain\Event\Assembler;

use SRC\Domain\Event\DTO\EventDTO;

class EventDTOAssembler
{
    private const EVENT_TYPE = 'type';
    private const EVENT_OBJECT = 'object';

    public function toDTO(array $array): EventDTO
    {
        $DTO = new EventDTO();
        $DTO->setType($array[self::EVENT_TYPE]);
        $DTO->setType($array[self::EVENT_OBJECT]);
        return $DTO;
    }
}
