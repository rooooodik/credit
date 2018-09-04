<?php

namespace App\Services\Credit\Create\ServiceAdapter;

use App\Common\Service\ServiceInterface;
use App\Dto\Credit\CreditRequest;
use App\Dto\Credit\PaymentList;
use App\Services\Credit\Create\Calculator\CalculatorInterface;

final class CalculatorService implements ServiceInterface
{
    /**
     * @var CalculatorInterface
     */
    private $calculator;

    /**
     * @param CalculatorInterface $calculator
     */
    public function __construct(CalculatorInterface $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * @param CreditRequest $dto
     * @return PaymentList
     */
    public function behave(object $dto): object
    {
        return $this->calculator->calculate($dto);
    }
}
