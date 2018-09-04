<?php

namespace App\Common\Transformer\Response;

use App\Common\Transformer\Response\Builder\ResponseBuilderInterface;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

final class ResponseTransformer implements ResponseTransformerInterface
{
    /**
     * @var ResponseBuilderInterface
     */
    private $responseBuilder;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var string
     */
    private $serializationFormat;

    /**
     * @param ResponseBuilderInterface $responseBuilder
     * @param SerializerInterface $serializer
     * @param string $serializationFormat
     */
    public function __construct(
        ResponseBuilderInterface $responseBuilder,
        SerializerInterface $serializer,
        string $serializationFormat
    ) {
        $this->responseBuilder = $responseBuilder;
        $this->serializer = $serializer;
        $this->serializationFormat = $serializationFormat;
    }

    public function transform(object $dto): Response
    {
        return $this->responseBuilder->build($this->serializer->serialize($dto, $this->serializationFormat));
    }
}
