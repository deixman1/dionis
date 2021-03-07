<?php
declare(strict_types=1);

namespace functional\src\Application\Actions\VK;

use Codeception\Stub;
use FunctionalTester;
use Helper\Essential\Request\RequestFixturesFactory;
use Helper\Essential\Response\ResponseFixturesFactory;
use Helper\Essential\Stubs\Api\Request\EventActionRequestStubs;
use Helper\Essential\Stubs\Api\Response\EventActionResponseStubs;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use SRC\Application\Actions\VK\EventAction;
use SRC\Domain\Event\Assembler\EventDTOAssembler;
use SRC\Domain\Event\Service\EventService;

class EventActionCest
{
    protected FunctionalTester $tester;
    private LoggerInterface $logger;
    private EventDTOAssembler $eventDTOAssembler;
    private EventService $eventService;
    private ContainerInterface $container;

    public function _before(FunctionalTester $tester)
    {
        $this->tester = $tester;
        $this->container = getContainer();
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
        $result = json_decode((string)$eventAction->__invoke(
            RequestFixturesFactory::createRequestWithQueryData(
                'GET',
                EventActionRequestStubs::getDataEventConfirmation()
            ),
            ResponseFixturesFactory::createEmptyResponse(),
            []
        )->getBody(), true);
        $this->tester->assertEquals(EventActionResponseStubs::getDataEventConfirmationResult(), $result);
    }

}
