<?php

namespace App\Services\Credit\Create\Calculator\Assembler\Payment;

use App\Dto\Credit\CreditRequest;
use App\Dto\Credit\Payment;

interface AssemblerInterface
{
    /**
     * @param CreditRequest $dto
     * @param $monthPercent
     * @param $perMonthDebpPayment
     * @param $reminder
     * @param $num
     * @param Payment $payment
     */
    public function assemble(
        CreditRequest $dto,
        $monthPercent,
        $perMonthDebpPayment,
        $reminder,
        $num,
        Payment $payment
    ): void;
}
