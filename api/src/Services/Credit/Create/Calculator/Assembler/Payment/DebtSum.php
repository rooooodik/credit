<?php

namespace App\Services\Credit\Create\Calculator\Assembler\Payment;

use App\Common\Exception\InvalidConfigurationException;
use App\Dto\Credit\CreditRequest;
use App\Dto\Credit\Payment;

final class DebtSum implements AssemblerInterface
{
    /**
     * @var int
     */
    private $precision;

    /**
     * @param int $precision
     */
    public function __construct(int $precision)
    {
        $this->precision = $precision;
    }

    /**
     * {@inheritdoc}
     * @throws InvalidConfigurationException
     */
    public function assemble(
        CreditRequest $dto,
        $monthPercent,
        $perMonthDebpPayment,
        $reminder,
        $num,
        Payment $payment
    ): void {
        if (null === $payment->getPercentsSum()) {
            throw new InvalidConfigurationException('Percent sum need to be set');
        }

        $payment->setDebtSum(round($perMonthDebpPayment - $payment->getPercentsSum(), $this->precision));
    }
}
