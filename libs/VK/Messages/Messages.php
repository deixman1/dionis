<?php


namespace Libs\VK\Messages;


use Libs\VK\VK;

class Messages extends VK
{
    private const METHOD_SEND = 'messages.send';

    public function send(array $params)
    {
        $this->call(self::METHOD_SEND, $params);
    }
}