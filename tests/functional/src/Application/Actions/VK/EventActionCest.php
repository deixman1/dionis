<?php
declare(strict_types=1);

use Codeception\Stub;
use Helper\Essential\Request\RequestFixturesFactory;
use Helper\Essential\Response\ResponseFixturesFactory;
use Helper\Essential\Stubs\Api\Request\EventActionRequestStubs;
use Psr\Log\LoggerInterface;
use SRC\Application\Actions\VK\EventAction;
use SRC\Domain\Event\Assembler\EventDTOAssembler;
use SRC\Domain\Event\Service\EventService;
use Helper\FunctionalTesterBase;

class EventActionCest extends FunctionalTesterBase
{
    private FunctionalTester $tester;
    private LoggerInterface $logger;
    private EventDTOAssembler $eventDTOAssembler;
    private EventService $eventService;

    protected function _before()
    {
        $this->logger = Stub::makeEmpty(LoggerInterface::class);
        $this->eventDTOAssembler = $this->container->get(EventDTOAssembler::class);
        $this->eventService = $this->container->get(EventService::class);
    }

    public function testEventConfirmation()
    {
        $eventAction = new EventAction(
            $this->logger,
            $this->eventDTOAssembler,
            $this->eventService
        );
        $result = $eventAction->__invoke(
            RequestFixturesFactory::createRequestWithQueryData(
                'GET',
                EventActionRequestStubs::getDataEventConfirmation()
            ),
            ResponseFixturesFactory::createEmptyResponse(),
            []
        );
        dd($result);
    }

}
