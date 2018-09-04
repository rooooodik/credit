<?php

namespace App\Services\Credit\Create\Calculator\Assembler\Payment;

use App\Dto\Credit\CreditRequest;
use App\Dto\Credit\Payment;
use DateInterval;
use Exception;

final class PaymentDate implements AssemblerInterface
{
    /**
     * {@inheritdoc}
     * @throws Exception
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
        $payment->setPaymentDate((clone $dto->getFirstPaymentDate())->add(new DateInterval('P' . $num . 'M')));
    }

}
