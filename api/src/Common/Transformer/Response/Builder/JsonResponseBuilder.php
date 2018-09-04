<?php

namespace App\Common\Transformer\Response\Builder;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class JsonResponseBuilder implements ResponseBuilderInterface
{
    /**
     * @var int
     */
    private $httpCode;

    /**
     * @var string[]
     */
    private $headers;

    /**
     * @param int $httpCode
     * @param string[] $headers
     */
    public function __construct(int $httpCode, array $headers)
    {
        $this->httpCode = $httpCode;
        $this->headers = $headers;
    }

    public function build(string $content): Response
    {
        return new JsonResponse($content, $this->httpCode, $this->headers, true);
    }
}
