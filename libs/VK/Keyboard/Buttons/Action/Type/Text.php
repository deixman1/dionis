<?php
declare(strict_types=1);

namespace Libs\VK\Keyboard\Buttons\Action\Type;


use Libs\VK\Keyboard\Buttons\Action\Action;

class Text implements Action
{
    protected string $type = 'text';
    protected string $label;
    protected string $payload;

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'label' => $this->label,
            'payload' => $this->payload,
        ];
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @param string $payload
     */
    public function setPayload(string $payload): void
    {
        $this->payload = $payload;
    }
}
