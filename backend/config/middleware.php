<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Routing\RouteContext;
use Selective\Config\Configuration;
use Slim\Middleware\Session;
use Slim\App;

return function (App $app) {

    // This middleware will append the response header Access-Control-Allow-Methods with all allowed methods
    $app->add(function (Request $request, RequestHandlerInterface $handler): Response {
        $routeContext = RouteContext::fromRequest($request);
        $routingResults = $routeContext->getRoutingResults();
        $methods = $routingResults->getAllowedMethods();
        $requestHeaders = $request->getHeaderLine('Access-Control-Request-Headers');

        $response = $handler->handle($request);
        $response = $response->withHeader('Access-Control-Allow-Origin', '*');
        $response = $response->withHeader('Access-Control-Allow-Methods', implode(',', $methods));
        $response = $response->withHeader('Access-Control-Allow-Headers', $requestHeaders);
        // Optional: Allow Ajax CORS requests with Authorization header
        $response = $response->withHeader('Access-Control-Allow-Credentials', 'true');

        return $response;
    });

    // Create Session
    $app->add(new Session([
        'name' => 'uims',
        'autorefresh' => true,
        'lifetime' => '1 hours'
    ]));

    // Parse json, from data and xml
    $app->addBodyParsingMiddleware();

    // Add routing middleware
    $app->addRoutingMiddleware();

    // Get Container
    $container = $app->getContainer();

    // Add error handler middleware
    $settings = $container->get(Configuration::class)->getArray('error_handler_middleware');
    $displayErrorDetails = (bool) $settings['display_error_details'];
    $logErrors = (bool) $settings['log_errors'];
    $logErrorDetails = (bool) $settings['log_error_details'];
    $app->addErrorMiddleware($displayErrorDetails, $logErrors, $logErrorDetails);
};
