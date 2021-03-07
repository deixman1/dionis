<?php
declare(strict_types=1);

namespace Helper\Essential\Request;


use Psr\Http\Message\RequestInterface;
use Slim\Psr7\Factory\StreamFactory;
use Slim\Psr7\Headers;
use Slim\Psr7\Request;
use Slim\Psr7\Uri;

class RequestFixturesFactory
{
    public const GET_METHOD = 'GET';
    public const POST_METHOD = 'POST';

    public static function createRequestWithQueryData(string $method, array $data): RequestInterface
    {
        return new Request(
            $method,
            new Uri('http', 'localhost', null, '', http_build_query($data)),
            new Headers(),
            [],
            [],
            (new StreamFactory())->createStream(json_encode($data))
        );
    }
}