<?php

namespace App\Action\Item;

use App\Responder\JsonResponder;
use App\Domain\Item\Repository\ItemRepository;

/**
 * Class ItemAction
 *
 * @package App\Action\Item
 */
abstract class ItemAction
{
    /**
     * @var ItemRepository
     */
    protected $repository;

    /**
     * @var JsonResponder
     */
    protected $responder;

    /**
     * ItemAction constructor.
     *
     * @param ItemRepository $repository The ItemRepository
     * @param JsonResponder $responder The JsonResponder
     */
    public function __construct(ItemRepository $repository, JsonResponder $responder)
    {
        $this->repository = $repository;
        $this->responder = $responder;
    }
}
