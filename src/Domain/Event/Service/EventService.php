<?php

namespace SRC\Domain\Event\Service;

use Libs\VK\Messages\Messages;
use Psr\Log\LoggerInterface;

class EventService
{
    private LoggerInterface $logger;
    private Messages $messages;


    public function __construct(LoggerInterface $logger, Messages $messages)
    {
        $this->logger = $logger;
        $this->messages = $messages;
    }

    public function confirmation(): string
    {
        return 'ok';
    }

    public function message_new(): string
    {
        return 'ok';
    }
}
