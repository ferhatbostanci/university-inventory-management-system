<?php

namespace App\Action\Auth;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Class ItemGetAction
 *
 * @package App\Action\Item
 */
final class AuthPostAction extends AuthAction
{
    /**
     * @param Request $request The Request
     *
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        $data = $request->getParsedBody();
        $email = $data['email'];
        $password = $data['password'];
        if (empty($email) || empty($password)) {
            $message = [
                'code' => 400,
                'status' => 'error',
                'description' => 'Bilgiler eksik. Lütfen E-Posta ve Parola alanını eksiksiz doldurunuz'
            ];
            return $this->responder->render($message);
        }
        return $this->responder->render($this->repository->login($email, $password));
    }
}
