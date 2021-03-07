<?php
declare(strict_types=1);

namespace Libs\VK\Keyboard\Buttons;


use Libs\VK\Keyboard\Buttons\Action\Action;

class Button
{
    public const BUTTON_PRIMARY = 'primary';
    public const BUTTON_SECONDARY = 'secondary';
    public const BUTTON_NEGATIVE = 'negative';
    public const BUTTON_POSITIVE = 'positive';

    protected Action $action;
    protected string $color = self::BUTTON_POSITIVE;

    /**
     * @param Action $action
     */
    public function setAction(Action $action): void
    {
        $this->action = $action;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function toArray(): array
    {
        return [
            'action' => $this->action->toArray(),
            'color' => $this->color,
        ];
    }
}
