<?php
declare(strict_types=1);

namespace Helper\Essential\Response;


use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class ResponseFixturesFactory
{
    public static function createEmptyResponse(): ResponseInterface
    {
        return new Response();
    }
}