<?php

namespace SRC\Domain\Event\Service;

use Psr\Log\LoggerInterface;

class EventService
{
    private LoggerInterface $logger;


    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
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
