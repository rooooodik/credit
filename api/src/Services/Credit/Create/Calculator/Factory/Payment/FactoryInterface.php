<?php

namespace App\Services\Credit\Create\Calculator\Factory\Payment;

use App\Dto\Credit\Payment;

interface FactoryInterface
{
    /**
     * @return Payment
     */
    public function spawn(): Payment;
}
