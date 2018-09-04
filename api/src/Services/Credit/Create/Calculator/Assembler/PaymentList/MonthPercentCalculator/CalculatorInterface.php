<?php

namespace App\Services\Credit\Create\Calculator\Assembler\PaymentList\MonthPercentCalculator;

use App\Dto\Credit\CreditRequest;

interface CalculatorInterface
{
    /**
     * @param CreditRequest $dto
     * @return float
     */
    public function calculate(CreditRequest $dto): float;
}
