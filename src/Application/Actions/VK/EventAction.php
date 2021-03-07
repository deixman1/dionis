<?php
declare(strict_types=1);

namespace SRC\Application\Actions\VK;

use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use SRC\Application\Actions\Action;
use SRC\Domain\Event\Assembler\EventDTOAssembler;
use SRC\Domain\Event\Service\EventService;

class EventAction extends Action
{
    private EventDTOAssembler $eventDTOAssembler;
    private EventService $eventService;

    public function __construct(
        LoggerInterface $logger,
        EventDTOAssembler $eventDTOAssembler,
        EventService $eventService
    )
    {
        parent::__construct($logger);
        $this->eventDTOAssembler = $eventDTOAssembler;
        $this->eventService = $eventService;
    }

    protected function action(): ResponseInterface
    {

        $dto = $this->eventDTOAssembler->toDTO($this->request->getQueryParams());
        $this->logger->info(
            'событие от vk.com',
            [
                'data' => $this->request->getQueryParams()
            ]
        );
        $response = $this->eventService->{$dto->getType()}();

        return $this->responseJson($response);
    }
}
