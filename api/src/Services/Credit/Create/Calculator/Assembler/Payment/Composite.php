<?php

namespace App\Services\Credit\Create\Calculator\Assembler\Payment;

use App\Dto\Credit\CreditRequest;
use App\Dto\Credit\Payment;
use Exception;

final class Composite implements AssemblerInterface
{
    /**
     * @var AssemblerInterface[]
     */
    private $assemblerList;

    /**
     * @param AssemblerInterface[] $assemblerList
     */
    public function __construct(array $assemblerList)
    {
        $this->assemblerList = $assemblerList;
    }

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
        foreach ($this->assemblerList as $assembler) {
            $assembler->assemble($dto, $monthPercent, $perMonthDebpPayment, $reminder, $num, $payment);
        }
    }

}
