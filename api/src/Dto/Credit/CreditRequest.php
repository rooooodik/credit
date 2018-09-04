<?php

namespace App\Dto\Credit;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

class CreditRequest
{
    /**
     * @var float
     *
     * @Assert\NotBlank()
     * @Assert\Type("float")
     * @Assert\LessThan(
     *     value = 100000000
     * )
     * @Assert\GreaterThan(
     *     value = 0
     * )
     *
     * @Serializer\Type("float")
     */
    private $sum;

    /**
     * @var int
     *
     * @Assert\NotBlank()
     * @Assert\Type("int")
     * @Assert\LessThan(
     *     value = 600
     * )
     * @Assert\GreaterThan(
     *     value = 0
     * )
     *
     * @Serializer\Type("int")
     */
    private $periodMonths;

    /**
     * @var float
     *
     * @Assert\NotBlank()
     * @Assert\Type("float")
     * @Assert\LessThan(
     *     value = 100
     * )
     * @Assert\GreaterThan(
     *     value = 0
     * )
     *
     * @Serializer\Type("float")
     */
    private $rate;

    /**
     * @var DateTimeImmutable
     *
     * @Assert\NotBlank()
     * @Assert\Type("DateTimeImmutable")
     *
     * @Serializer\Type("DateTimeImmutable<'Y-m-d\TH:i:s.uT'>")
     */
    private $firstPaymentDate;

    /**
     * @return float
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param float $sum
     * @return CreditRequest
     */
    public function setSum(float $sum = null)
    {
        $this->sum = $sum;

        return $this;
    }

    /**
     * @return int
     */
    public function getPeriodMonths()
    {
        return $this->periodMonths;
    }

    /**
     * @param int $periodMonths
     * @return CreditRequest
     */
    public function setPeriodMonths(int $periodMonths = null)
    {
        $this->periodMonths = $periodMonths;

        return $this;
    }

    /**
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     * @return CreditRequest
     */
    public function setRate(float $rate = null)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getFirstPaymentDate()
    {
        return $this->firstPaymentDate;
    }

    /**
     * @param DateTimeImmutable $firstPaymentDate
     * @return CreditRequest
     */
    public function setFirstPaymentDate(DateTimeImmutable $firstPaymentDate = null)
    {
        $this->firstPaymentDate = $firstPaymentDate;

        return $this;
    }
}
