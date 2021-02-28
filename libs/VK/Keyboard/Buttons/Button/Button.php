<?php

namespace Libs\VK\Keyboard\Buttons\Button;


use Libs\VK\Keyboard\Buttons\Action\ActionAbstract;

class Button
{
    protected ActionAbstract $action;
    protected string $color;

    public function __construct(ActionAbstract $action, string $color = 'secondary')
    {
        $this->action = $action;
        $this->color = $color;
    }

    protected function toArray(): array
    {
        return [
            'action' => $this->action->toArray(),
            'color' => $this->color,
        ];
    }
}