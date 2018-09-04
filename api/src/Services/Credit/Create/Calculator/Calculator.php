<?php

namespace App\Services\Credit\Create\Calculator;

use App\Dto\Credit\CreditRequest;
use App\Dto\Credit\PaymentList;
use App\Services\Credit\Create\Calculator\Builder\PaymentList\BuilderInterface;

final class Calculator implements CalculatorInterface
{
    /**
     * @var BuilderInterface
     */
    private $paymentListBuilder;

    /**
     * @param BuilderInterface $paymentListBuilder
     */
    public function __construct(BuilderInterface $paymentListBuilder)
    {
        $this->paymentListBuilder = $paymentListBuilder;
    }

    /**
     * {@inheritdoc}
     */
    public function calculate(CreditRequest $dto): PaymentList
    {
        return $this->paymentListBuilder->build($dto);
    }
}
