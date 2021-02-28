<?php

namespace Libs\VK\Keyboard;


use Libs\VK\VK;
use Libs\VK\Keyboard\Buttons\ButtonsCollection;

class Keyboard
{
    protected bool $oneTime = false;
    protected ButtonsCollection $buttons;
    protected bool $inline = false;

    public function __construct(bool $oneTime, ButtonsCollection $buttons, bool $inline)
    {
        $this->oneTime = $oneTime;
        $this->buttons = $buttons;
        $this->inline = $inline;
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