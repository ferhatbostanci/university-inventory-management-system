<?php

namespace App\Middleware;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Middleware\Session;
use App\Responder\JsonResponder;

/**
 * JWT middleware.
 */
final class ContentMiddleware implements MiddlewareInterface
{

    /**
     * @var JsonResponder
     */
    private $responder;

    /**
     * ContentMiddleware constructor.
     *
     * @param JsonResponder $responder The JsonResponder
     */
    public function __construct(JsonResponder $responder)
    {
        $this->responder = $responder;
    }

    /**
     * Invoke middleware.
     *
     * @param ServerRequestInterface $request The ServerRequestInterface
     * @param RequestHandlerInterface $handler The RequestHandlerInterface
     *
     * @return ResponseInterface The ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        /*if ($request->getHeaderLine('Accept') !== 'application/json') {
            $message = [
                'code' => 400,
                'status' => 'error',
                'description' => 'İstek hatalı, lütfen Accept içinde  \'application/json\' belirtiniz.'
            ];
            return $this->responder->render($message);
        }*/
        return $handler->handle($request);
    }
}
