<?php

namespace App\Services\Credit\Create\Calculator\Assembler\Payment;

use App\Dto\Credit\CreditRequest;
use App\Dto\Credit\Payment;

final class PercentSum implements AssemblerInterface
{
    /**
     * @var int
     */
    private $precision;

    /**
     * @param int $precision
     */
    public function __construct(int $precision)
    {
        $this->precision = $precision;
    }

    /**
     * {@inheritdoc}
     */
    public function assemble(
        CreditRequest $dto,
        $monthPercent,
        $perMonthDebpPayment,
        $reminder,
        $num,
        Payment $payment
    ): void
    {
        $payment->setPercentsSum(round($reminder * ($monthPercent - 1), $this->precision));
    }
}
