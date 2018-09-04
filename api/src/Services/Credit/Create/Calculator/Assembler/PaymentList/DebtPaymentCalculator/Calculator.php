<?php

namespace App\Services\Credit\Create\Calculator\Assembler\PaymentList\DebtPaymentCalculator;

use App\Dto\Credit\CreditRequest;

final class Calculator implements CalculatorInterface
{
    /**
     * @var int
     */
    private $precision;

    /**
     * @param int $monthInYear
     */
    public function __construct(int $monthInYear)
    {
        $this->monthInYear = $monthInYear;
    }

    /**
     * {@inheritdoc}
     */
    public function calculate(CreditRequest $dto, float $monthPercent): float
    {
        return
            round(
                ($dto->getSum() * ($monthPercent ** $dto->getPeriodMonths()) * ($monthPercent - 1))
                / (($monthPercent ** $dto->getPeriodMonths()) - 1),
                $this->precision
            );
    }
}
