<?php
declare(strict_types=1);

namespace Libs\VK;


use Libs\VK\Message\Message;

interface VKInterface
{
    /**
     * @return Message
     */
    public function getMessage(): Message;

    /**
     * @param string $method
     * @param array $params
     * @return string
     */
    public function call(string $method, array $params): string;
}
