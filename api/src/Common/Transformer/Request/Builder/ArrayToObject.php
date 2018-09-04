<?php

namespace App\Common\Transformer\Request\Builder;

use JMS\Serializer\ArrayTransformerInterface;
use Throwable;

final class ArrayToObject implements BuilderInterface
{
    /**
     * @var ArrayTransformerInterface
     */
    private $arrayTransformer;

    /**
     * @var string
     */
    private $type;

    /**
     * @inheritdoc
     */
    public function __construct(ArrayTransformerInterface $arrayTransformer, string $type)
    {
        $this->arrayTransformer = $arrayTransformer;
        $this->type = $type;
    }

    /**
     * @param mixed $data
     * @return object
     */
    public function build($data): object
    {
        try {
            return $this->arrayTransformer->fromArray($data, $this->type);
        } catch (Throwable $e) {
            return new $this->type();
        }

    }
}
