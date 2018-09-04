<?php

namespace App\Services\Credit\Create\Calculator\Factory\PaymentList;

use App\Dto\Credit\PaymentList;

interface FactoryInterface
{
    /**
     * @return PaymentList
     */
    public function spawn(): PaymentList;
}
