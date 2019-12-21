<?php

namespace App\Action\User;

use App\Responder\JsonResponder;
use App\Domain\User\Repository\UserRepository;

/**
 * Class UserAction
 *
 * @package App\Action\User
 */
abstract class UserAction
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var JsonResponder
     */
    protected $responder;

    /**
     * UserAction constructor.
     *
     * @param UserRepository $repository The UserRepository
     * @param JsonResponder $responder The JsonResponder
     */
    public function __construct(UserRepository $repository, JsonResponder $responder)
    {
        $this->repository = $repository;
        $this->responder = $responder;
    }
}
