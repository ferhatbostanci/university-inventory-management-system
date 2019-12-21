<?php

namespace App\Action\User;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Class UserGetAction
 *
 * @package App\Action\User
 */
final class UserGetAction extends UserAction
{
    /**
     * @param Request $request The Request
     *
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $userid = intval($request->getAttribute('id'));
        return $this->responder->render($this->repository->getUser($userid));
    }
}
