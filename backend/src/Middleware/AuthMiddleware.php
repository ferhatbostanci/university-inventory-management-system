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
final class AuthMiddleware implements MiddlewareInterface
{

    /**
     * @var JsonResponder
     */
    private $responder;

    /**
     * AuthMiddleware constructor.
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
        $session = new \SlimSession\Helper;
        $loggedIn = $session->offsetGet('logged_in');
        if (!$loggedIn) {
            $message = [
                'code' => 401,
                'status' => 'error',
                'description' => 'İstek için kimlik doğrulaması gerekiyor'
            ];
            /*
             * return $this->responder->render($message);
             */
            return $handler->handle($request);
        }
        return $handler->handle($request);
    }
}