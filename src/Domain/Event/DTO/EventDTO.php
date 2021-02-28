<?php

namespace SRC\Domain\Event\DTO;

class EventDTO
{
    private string $type;
    private string $object;

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setObject(string $object): void
    {
        $this->object = $object;
    }

    public function getObject(): string
    {
        return $this->object;
    }
}
