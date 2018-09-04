<?php

namespace App\Services\Credit\Create\Calculator\Builder\Payment;

use App\Dto\Credit\CreditRequest;
use App\Dto\Credit\Payment;
use App\Dto\Credit\PaymentList;

interface BuilderInterface
{
    /**
     * @param CreditRequest $dto
     * @param float $monthPercent
     * @param float $perMonthDebpPayment
     * @param float $reminder
     * @param int $num
     * @return Payment
     */
    public function build(
        CreditRequest $dto,
        float $monthPercent,
        float $perMonthDebpPayment,
        float $reminder,
        int $num
    ): Payment;
}
