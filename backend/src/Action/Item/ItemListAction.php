<?php

namespace App\Action\Item;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Class ItemListAction
 *
 * @package App\Action\Item
 */
final class ItemListAction extends ItemAction
{
    /**
     * @param Request $request The Request
     *
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        return $this->responder->render($this->repository->getAllItems());
    }
}
