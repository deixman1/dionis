<?php
declare(strict_types=1);

namespace SRC\Domain\Event\Service;

use Libs\VK\Keyboard\Buttons\Button;
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
//        $this->vk->getMessage()->getKeyboardBuilder()
//            ->addNewLine()
//            ->addButtonText(WHAT_DO_YOU_SEARCH,'WHAT_DO_YOU_SEARCH',Button::BUTTON_POSITIVE);
        return $this->vk->getConfirmationToken();
    }

    public function message_new(): string
    {
        return 'ok';
    }
}
