<?php

namespace App\Responder;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use App\Exception\JsonEncodeException;

/**
 * Class JsonResponder
 *
 * @package App\Responder
 */
final class JsonResponder
{
    /**
     * @var ResponseFactoryInterface
     */
    private $responseFactory;

    /**
     * JsonResponder constructor.
     *
     * @param ResponseFactoryInterface $responseFactory The ResponseFactoryInterface
     */
    public function __construct(ResponseFactoryInterface $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }


    /**
     * @param array|null $data Data can be an array or empty
     *
     * @return ResponseInterface
     */
    public function render(array $data = null): ResponseInterface
    {
        $response = $this->responseFactory->createResponse()->withHeader('Content-Type', 'application/json');
        if (isset($data['code'])) {
            $response = $response->withStatus($data['code']);
            unset($data['code']);
        }

        $json = json_encode($data);
        if (!$json) {
            throw new JsonEncodeException('Malformed UTF-8 characters, possibly incorrectly encoded.');
        }
        $response->getBody()->write($json);

        return $response;
    }
}
