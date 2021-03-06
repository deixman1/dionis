<?php

namespace SRC\Domain\Event\Builder;


use Libs\VK\Buttons\Action\Type\Text;
use Libs\VK\Buttons\Button;
use Libs\VK\Keyboard\Keyboard;

class KeyboardBuilder
{
    /**
     * @var Keyboard
     */
    private Keyboard $keyboard;
    /**
     * @var Button
     */
    private Button $button;
    /**
     * @var array
     */
    private array $buttons;
    /**
     * @var Text
     */
    private Text $typeText;

    public function __construct(Keyboard $keyboard)
    {
        $this->keyboard = $keyboard;
        $this->typeText = new Text();
        $this->button = new Button();
    }

    /**
     * @param bool $oneTime
     */
    public function setOneTime(bool $oneTime): void
    {
        $this->keyboard->setOneTime($oneTime);
    }

    /**
     * @param bool $inline
     */
    public function setInline(bool $inline): void
    {
        $this->keyboard->setInline($inline);
    }

    /**
     * @param array $buttons
     */
    public function setButtonsInKeyboard(array $buttons): void
    {
        $this->keyboard->setButtons($buttons);
    }

    /**
     */
    public function addNewLine(): void
    {
        $this->buttons[] = [];
        $this->setButtonsInKeyboard($this->buttons);
    }

    /**
     * @param string $label
     * @param string $payload
     * @param string $color
     */
    public function addButtonText(string $label, string $payload, string $color = ''): void
    {
        $this->typeText->setLabel($label);
        $this->typeText->setPayload($payload);
        $this->button->setAction($this->typeText);
        if ($color !== '') {
            $this->button->setColor($color);
        }
        $this->addButton($this->button->toArray());
        $this->setButtonsInKeyboard($this->buttons);
    }

    /**
     * @param array $button
     */
    private function addButton(array $button): void
    {
        $this->buttons[][] = $button;
    }

    /**
     * @return Keyboard
     */
    public function getKeyboard(): Keyboard
    {
        return $this->keyboard;
    }

}