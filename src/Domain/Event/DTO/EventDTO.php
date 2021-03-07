<?php
declare(strict_types=1);

namespace SRC\Domain\Event\DTO;

class EventDTO
{
    private string $type;
    private string $object;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getObject(): string
    {
        return $this->object;
    }

    public function setObject(string $object): void
    {
        $this->object = $object;
    }
}
