<?php

use Slim\App;
use Slim\Factory\AppFactory;
use Selective\Config\Configuration;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Illuminate\Database\Connection;
use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Container\Container as IlluminateContainer;

return [

    App::class => function (ContainerInterface $container) {
        AppFactory::setContainer($container);
        $app = AppFactory::create();

        // Optional: Set the base path to run the app in a sub-directory
        // The public directory must not be part of the base path
        //$app->setBasePath('/slim4-tutorial');

        return $app;
    },

    Configuration::class => function () {
        return new Configuration(require __DIR__ . '/settings.php');
    },

    // For the JsonResponder
    ResponseFactoryInterface::class => static function (ContainerInterface $container) {
        $app = $container->get(App::class);
        return $app->getResponseFactory();
    },

    // Database connection
    Connection::class => function (ContainerInterface $container) {
        $factory = new ConnectionFactory(new IlluminateContainer());

        $connection = $factory->make($container->get(Configuration::class)->getArray('db'));

        // Disable the query log to prevent memory issues
        $connection->disableQueryLog();

        return $connection;
    },

    PDO::class => function (ContainerInterface $container) {
        return $container->get(Connection::class)->getPdo();
    }

];
