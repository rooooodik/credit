<?php

namespace App\Services\Credit\Create\Calculator\Builder\PaymentList;

use App\Dto\Credit\CreditRequest;
use App\Dto\Credit\PaymentList;

interface BuilderInterface
{
    /**
     * @param CreditRequest $dto
     * @return PaymentList
     */
    public function build(CreditRequest $dto): PaymentList;
}
