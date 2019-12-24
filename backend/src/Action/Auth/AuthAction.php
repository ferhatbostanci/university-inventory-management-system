<?php

namespace App\Action\Auth;

use App\Responder\JsonResponder;
use App\Domain\Auth\Repository\AuthRepository;

/**
 * Class AuthAction
 *
 * @package App\Action\Auth
 */
abstract class AuthAction
{
    /**
     * @var AuthRepository
     */
    protected $repository;

    /**
     * @var JsonResponder
     */
    protected $responder;

    /**
     * ItemAction constructor.
     *
     * @param AuthRepository $repository The AuthRepository
     * @param JsonResponder $responder The JsonResponder
     */
    public function __construct(AuthRepository $repository, JsonResponder $responder)
    {
        $this->repository = $repository;
        $this->responder = $responder;
    }
}
