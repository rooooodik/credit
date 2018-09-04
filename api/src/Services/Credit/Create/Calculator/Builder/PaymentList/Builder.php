<?php

namespace App\Services\Credit\Create\Calculator\Builder\PaymentList;

use App\Dto\Credit\CreditRequest;
use App\Dto\Credit\PaymentList;
use App\Services\Credit\Create\Calculator\Assembler\PaymentList\AssemblerInterface;
use App\Services\Credit\Create\Calculator\Factory\PaymentList\FactoryInterface;

final class Builder implements BuilderInterface
{
    /**
     * @var FactoryInterface
     */
    private $paymentListFactory;

    /**
     * @var AssemblerInterface
     */
    private $paymentListAssembler;

    /**
     * @param FactoryInterface $paymentListFactory
     * @param AssemblerInterface $paymentListAssembler
     */
    public function __construct(FactoryInterface $paymentListFactory, AssemblerInterface $paymentListAssembler)
    {
        $this->paymentListFactory = $paymentListFactory;
        $this->paymentListAssembler = $paymentListAssembler;
    }

    /**
     * {@inheritdoc}
     */
    public function build(CreditRequest $dto): PaymentList
    {
        $paymentList = $this->paymentListFactory->spawn();

        $this->paymentListAssembler->assemble($dto, $paymentList);

        return $paymentList;
    }
}
