<?php

namespace App\Services\Credit\Create\Calculator\Assembler\PaymentList;

use App\Dto\Credit\CreditRequest;
use App\Dto\Credit\PaymentList;

interface AssemblerInterface
{
    /**
     * @param CreditRequest $dto
     * @param PaymentList $paymentList
     * @return void
     */
    public function assemble(CreditRequest $dto, PaymentList $paymentList): void;
}
