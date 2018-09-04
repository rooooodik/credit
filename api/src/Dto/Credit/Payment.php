<?php

namespace App\Dto\Credit;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class Payment
{
    /**
     * @var int
     *
     * @Assert\NotNull()
     * @Assert\Type("int")
     *
     * @Serializer\Type("int")
     */
    private $paymentNumber;

    /**
     * @var DateTimeImmutable
     *
     * @Assert\NotNull()
     * @Assert\Type("DateTimeImmutable")
     *
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s.uT'>")
     */
    private $paymentDate;

    /**
     * @var float
     *
     * @Assert\NotNull()
     * @Assert\Type("float")
     *
     * @Serializer\Type("float")
     */
    private $debtSum;

    /**
     * @var float
     *
     * @Assert\NotNull()
     * @Assert\Type("float")
     *
     * @Serializer\Type("float")
     */
    private $percentsSum;

    /**
     * @var float
     *
     * @Assert\NotNull()
     * @Assert\Type("float")
     *
     * @Serializer\Type("float")
     */
    private $sum;

    /**
     * @var float
     *
     * @Assert\NotNull()
     * @Assert\Type("float")
     *
     * @Serializer\Type("float")
     */
    private $remainder;

    /**
     * @return int
     */
    public function getPaymentNumber()
    {
        return $this->paymentNumber;
    }

    /**
     * @param int $paymentNumber
     * @return Payment
     */
    public function setPaymentNumber(int $paymentNumber = null)
    {
        $this->paymentNumber = $paymentNumber;

        return $this;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @param DateTimeImmutable $paymentDate
     * @return Payment
     */
    public function setPaymentDate(DateTimeImmutable $paymentDate = null)
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    /**
     * @return float
     */
    public function getDebtSum()
    {
        return $this->debtSum;
    }

    /**
     * @param float $debtSum
     * @return Payment
     */
    public function setDebtSum(float $debtSum = null)
    {
        $this->debtSum = $debtSum;

        return $this;
    }

    /**
     * @return float
     */
    public function getPercentsSum()
    {
        return $this->percentsSum;
    }

    /**
     * @param float $percentsSum
     * @return Payment
     */
    public function setPercentsSum(float $percentsSum = null)
    {
        $this->percentsSum = $percentsSum;

        return $this;
    }

    /**
     * @return float
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param float $sum
     * @return Payment
     */
    public function setSum(float $sum = null)
    {
        $this->sum = $sum;

        return $this;
    }

    /**
     * @return float
     */
    public function getRemainder()
    {
        return $this->remainder;
    }

    /**
     * @param float $remainder
     * @return Payment
     */
    public function setRemainder(float $remainder = null)
    {
        $this->remainder = $remainder;

        return $this;
    }
}
