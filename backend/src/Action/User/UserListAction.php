<?php

namespace App\Action\User;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Class UserListAction
 *
 * @package App\Action\User
 */
final class UserListAction extends UserAction
{
    /**
     * @param Request $request The Request
     *
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        return $this->responder->render($this->repository->getAllUsers());
    }
}
