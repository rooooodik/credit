<?php

namespace App\Services\Credit\Create\Calculator\Assembler\PaymentList\MonthPercentCalculator;

use App\Dto\Credit\CreditRequest;

final class Calculator implements CalculatorInterface
{
    /**
     * @var int
     */
    private $monthInYear;

    /**
     * @param int $monthInYear
     */
    public function __construct(int $monthInYear)
    {
        $this->monthInYear = $monthInYear;
    }

    public function calculate(CreditRequest $dto): float
    {
        return (1 + ($dto->getRate() / 100)) ** (1 / $this->monthInYear);
    }
}
