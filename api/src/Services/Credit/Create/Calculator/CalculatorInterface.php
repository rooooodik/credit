<?php

namespace App\Services\Credit\Create\Calculator;

use App\Dto\Credit\CreditRequest;
use App\Dto\Credit\PaymentList;

interface CalculatorInterface
{
    /**
     * @param CreditRequest $dto
     * @return PaymentList
     */
    public function calculate(CreditRequest $dto): PaymentList;
}
