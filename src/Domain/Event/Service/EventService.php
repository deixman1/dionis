<?php

namespace SRC\Domain\Event\Service;

use Libs\VK\VKInterface;

class EventService
{
    private VKInterface $vk;


    public function __construct(VKInterface $vk)
    {
        $this->vk = $vk;
    }

    public function confirmation(): string
    {
        $this->vk->getMessage()->getKeyboardBuilder()->addNewLine()->addButtonText('asd','asd','asda');
        return $this->vk->getConfirmationToken();
    }

    public function message_new(): string
    {
        return 'ok';
    }
}
