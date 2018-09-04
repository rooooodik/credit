<?php

namespace App\Services\Credit\Create\Calculator\Factory\Payment;

use App\Dto\Credit\Payment;

final class Factory implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function spawn(): Payment
    {
        return new Payment();
    }
}
