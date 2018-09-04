<?php

namespace App\Services\Credit\Create\Calculator\Factory\PaymentList;

use App\Dto\Credit\PaymentList;

final class Factory implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function spawn(): PaymentList
    {
        return new PaymentList();
    }
}
