<?php

namespace Libs\VK\Keyboard\Buttons\Action\Type;


use Libs\VK\Keyboard\Buttons\Action\ActionAbstract;

class Text extends ActionAbstract
{
    protected string $type = 'text';
    protected string $label;
    protected string $payload;

    public function __construct(string $label, string $payload)
    {
        $this->label = $label;
        $this->payload = $payload;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'label' => $this->label,
            'payload' => $this->payload,
        ];
    }
}