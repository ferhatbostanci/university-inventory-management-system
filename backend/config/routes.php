<?php

use Slim\App;
use Slim\Routing\RouteCollectorProxy;

use App\Middleware\AuthMiddleware;
use App\Middleware\ContentMiddleware;
use App\Action\Auth\AuthPostAction;
use App\Action\User\UserListAction;
use App\Action\User\UserGetAction;
use App\Action\Item\ItemListAction;
use App\Action\Item\ItemGetAction;

return function (App $app) {
    // v1 API Endpoints
    $app->group('/api/v1', function (RouteCollectorProxy $group) {
        // Users
        $group->get('/users', UserListAction::class);
        $group->get('/users/{id}', UserGetAction::class);
        // Items
        $group->get('/items', ItemListAction::class);
        $group->get('/items/{id}', ItemGetAction::class);
    })->add(AuthMiddleware::class);

    // Authentication
    $app->post('/api/v1/auth', AuthPostAction::class);
};
