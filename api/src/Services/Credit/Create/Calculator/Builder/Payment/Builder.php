<?php

namespace App\Services\Credit\Create\Calculator\Builder\Payment;

use App\Dto\Credit\CreditRequest;
use App\Dto\Credit\Payment;
use App\Services\Credit\Create\Calculator\Assembler\Payment\AssemblerInterface;
use App\Services\Credit\Create\Calculator\Factory\Payment\FactoryInterface;

final class Builder implements BuilderInterface
{
    /**
     * @var FactoryInterface
     */
    private $paymentFactory;

    /**
     * @var AssemblerInterface
     */
    private $paymentAssembler;

    /**
     * @param FactoryInterface $paymentFactory
     * @param AssemblerInterface $paymentAssembler
     */
    public function __construct(FactoryInterface $paymentFactory, AssemblerInterface $paymentAssembler)
    {
        $this->paymentFactory = $paymentFactory;
        $this->paymentAssembler = $paymentAssembler;
    }

    /**
     * {@inheritdoc}
     */
    public function build(
        CreditRequest $dto,
        float $monthPercent,
        float $perMonthDebpPayment,
        float $reminder,
        int $num
    ): Payment {
        $payment = $this->paymentFactory->spawn();

        $this->paymentAssembler->assemble(
            $dto,
            $monthPercent,
            $perMonthDebpPayment,
            $reminder,
            $num,
            $payment
        );

        return $payment;
    }
}
