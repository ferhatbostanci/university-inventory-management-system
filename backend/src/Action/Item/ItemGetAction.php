<?php

namespace App\Action\Item;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Class ItemGetAction
 *
 * @package App\Action\Item
 */
final class ItemGetAction extends ItemAction
{
    /**
     * @param Request $request The Request
     *
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $userid = intval($request->getAttribute('id'));
        return $this->responder->render($this->repository->getItem($userid));
    }
}
