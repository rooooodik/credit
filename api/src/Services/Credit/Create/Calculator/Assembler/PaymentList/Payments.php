<?php

namespace App\Services\Credit\Create\Calculator\Assembler\PaymentList;

use App\Dto\Credit\CreditRequest;
use App\Dto\Credit\Payment;
use App\Dto\Credit\PaymentList;
use App\Services\Credit\Create\Calculator\Assembler\PaymentList\DebtPaymentCalculator\CalculatorInterface as DebtPaymentCalculator;
use App\Services\Credit\Create\Calculator\Assembler\PaymentList\MonthPercentCalculator\CalculatorInterface as MonthPaymentCalculator;
use App\Services\Credit\Create\Calculator\Builder\Payment\BuilderInterface;

final class Payments implements AssemblerInterface
{
    /**
     * @var MonthPaymentCalculator
     */
    private $monthPercentCalculator;

    /**
     * @var DebtPaymentCalculator
     */
    private $debtPaymentCalculator;

    /**
     * @var BuilderInterface
     */
    private $paymentBuilder;

    /**
     * @param BuilderInterface $paymentBuilder
     * @param DebtPaymentCalculator $debtPaymentCalculator
     * @param MonthPaymentCalculator $monthPercentCalculator
     */
    public function __construct(
        BuilderInterface $paymentBuilder,
        DebtPaymentCalculator $debtPaymentCalculator,
        MonthPaymentCalculator $monthPercentCalculator
    ) {
        $this->paymentBuilder = $paymentBuilder;
        $this->debtPaymentCalculator = $debtPaymentCalculator;
        $this->monthPercentCalculator = $monthPercentCalculator;
    }

    /**
     * {@inheritdoc}
     */
    public function assemble(CreditRequest $dto, PaymentList $paymentList): void
    {
        $monthPercent = $this->monthPercentCalculator->calculate($dto);

        $paymentList->setPayments(
            $this->calculatePayments(
                $dto,
                $monthPercent,
                $this->debtPaymentCalculator->calculate($dto, $monthPercent)
            )
        );
    }

    /**
     * @param CreditRequest $dto
     * @param $monthPercent
     * @param $perMonthDebpPayment
     * @return Payment[]
     */
    private function calculatePayments(CreditRequest $dto, $monthPercent, $perMonthDebpPayment): array
    {
        $payments = [];
        $reminder = $dto->getSum();

        for ($num = 1; $num <= $dto->getPeriodMonths(); $num++) {
            $payments[] =
                $this->paymentBuilder->build(
                    $dto,
                    $monthPercent,
                    $perMonthDebpPayment,
                    $reminder,
                    $num
                );
        }

        return $payments;
    }
}
