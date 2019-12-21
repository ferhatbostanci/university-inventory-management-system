<?php

use Selective\Config\Configuration;
use Slim\App;

return function (App $app) {
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
