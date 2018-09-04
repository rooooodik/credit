<?php

namespace App\Dto\Credit;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class PaymentList
{
    /**
     * @var Payment[]
     */
    private $payments;

    /**
     * @return Payment[]
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @param Payment[] $payments
     * @return PaymentList
     */
    public function setPayments(array $payments = [])
    {
        $this->payments = $payments;

        return $this;
    }
}
