<?php

namespace App\Common\Transformer\Request;

use App\Common\Transformer\Request\Builder\BuilderInterface;
use App\Common\Transformer\Request\DataExtractor\DataExtractorInterface;
use Symfony\Component\HttpFoundation\Request;

final class RequestTransformer implements RequestTransformerInterface
{
    /**
     * @var DataExtractorInterface
     */
    private $dataExtractor;

    /**
     * @var BuilderInterface
     */
    private $builder;

    /**
     * @param DataExtractorInterface $dataExtractor
     * @param BuilderInterface $builder
     */
    public function __construct(DataExtractorInterface $dataExtractor, BuilderInterface $builder)
    {
        $this->dataExtractor = $dataExtractor;
        $this->builder = $builder;
    }

    /**
     * @inheritdoc
     */
    public function transform(Request $request): object
    {
        return $this->builder->build($this->dataExtractor->extract($request));
    }
}
