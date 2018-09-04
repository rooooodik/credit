<?php

namespace App\Common\Transformer\Response\ViolationResponse;

use App\Common\Transformer\Response\ResponseTransformerInterface;
use App\Dto\Hint\Hint;
use App\Dto\Hint\HintList;
use JMS\Serializer\Metadata\PropertyMetadata;
use JMS\Serializer\Naming\PropertyNamingStrategyInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

final class ViolationListResponseTransformer implements ViolationListResponseTransformerInterface
{
    /**
     * @var ResponseTransformerInterface
     */
    private $responseTransformer;

    /**
     * @var PropertyNamingStrategyInterface
     */
    private $namingStrategy;

    /**
     * @param ResponseTransformerInterface $responseTransformer
     * @param PropertyNamingStrategyInterface $namingStrategy
     */
    public function __construct(
        ResponseTransformerInterface $responseTransformer,
        PropertyNamingStrategyInterface $namingStrategy
    ) {
        $this->responseTransformer = $responseTransformer;
        $this->namingStrategy = $namingStrategy;
    }

    public function transform(ConstraintViolationListInterface $violationList): Response
    {
        return $this->responseTransformer->transform($this->createHintList($violationList));
    }

    /**
     * @inheritdoc
     */
    private function createHintList(ConstraintViolationListInterface $violationList): HintList
    {
        return
            (new HintList())
                ->setHints($this->createHints($violationList))
            ;
    }

    /**
     * @param ConstraintViolationListInterface $violationList
     * @return Hint[]
     */
    private function createHints(ConstraintViolationListInterface $violationList): array
    {
        $hints = [];

        foreach ($violationList as $violation) {
            /** @var ConstraintViolationInterface $violation */
            $hints[] =
                (new Hint())
                    ->setIdentifier(
                        $this->namingStrategy->translateName(
                            new PropertyMetadata(get_class($violation->getRoot()), $violation->getPropertyPath())
                        )
                    )
                    ->setMessage($violation->getMessage());
        }

        return $hints;
    }
}
