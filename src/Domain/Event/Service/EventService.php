<?php

namespace SRC\Domain\Event\Service;

use Libs\VK\VK;

class EventService
{
    private VK $vk;


    public function __construct(VK $vk)
    {
        $this->vk = $vk;
    }

    public function confirmation(): string
    {
        return $this->vk->getConfirmationToken();
    }

    public function message_new(): string
    {
        return 'ok';
    }
}
