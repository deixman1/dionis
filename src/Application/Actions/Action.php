<?php

namespace SRC\Application\Actions;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

abstract class Action
{
    protected LoggerInterface $logger;
    protected RequestInterface $request;
    protected ResponseInterface $response;
    protected array $args;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    abstract protected function action(): ResponseInterface;

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $this->request = $request;
        $this->response = $response;
        $this->args = $args;
        return $this->action();
    }

    protected function getParam(string $name, $default = null)
    {
        return $args[$name] ?? $default;
    }

    protected function getJsonData(): ?array
    {
        return json_decode((string)$this->request->getBody(), true);
    }

    protected function responseJson($data = null, $status = 200): ResponseInterface
    {
        $json = json_encode($data, JSON_PRETTY_PRINT);
        $this->response->getBody()->write($json);
        return $this->response
            ->withStatus($status)
            ->withHeader('Content-Type', 'application/json');
    }

    protected function responseMedia($data = null, $status = 200): ResponseInterface
    {
        $this->response->getBody()->write($data);
        return $this->response
            ->withStatus($status)
            ->withHeader('Content-Type', 'audio/mpeg');
    }
}
