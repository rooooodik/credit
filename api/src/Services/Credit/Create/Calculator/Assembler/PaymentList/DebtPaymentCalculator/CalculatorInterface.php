<?php

namespace App\Services\Credit\Create\Calculator\Assembler\PaymentList\DebtPaymentCalculator;

use App\Dto\Credit\CreditRequest;

interface CalculatorInterface
{
    /**
     * @param CreditRequest $dto
     * @param float $monthPercent
     * @return float
     */
    public function calculate(CreditRequest $dto, float $monthPercent): float;
}
