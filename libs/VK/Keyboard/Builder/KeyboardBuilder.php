<?php

namespace Libs\VK\Keyboard;


use Libs\VK\VK;
use Libs\VK\Keyboard\Buttons\ButtonsCollection;

class KeyboardBuilder implements Builder
{
    protected bool $oneTime = false;
    protected ButtonsCollection $buttons;
    protected bool $inline = false;

    public function setOneTime(bool $oneTime): void
    {
        $this->oneTime = $oneTime;
    }

    public function setInline(bool $inline): void
    {
        $this->inline = $inline;
    }

    public function setButtons(ButtonsCollection $buttons): void
    {
        $this->buttons = $buttons;
    }

    protected function toArray(): array
    {
        return [
            'one_time' => $this->oneTime,
            'buttons' => $this->buttons->toArray(),
            'inline' => $this->inline,
        ];
    }
}