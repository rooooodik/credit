<?php

namespace App\Services\Credit\Create\Calculator\Assembler\Payment;

use App\Dto\Credit\CreditRequest;
use App\Dto\Credit\Payment;

final class PaymentNumber implements AssemblerInterface
{
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
        $payment->setPaymentNumber($num);
    }
}
