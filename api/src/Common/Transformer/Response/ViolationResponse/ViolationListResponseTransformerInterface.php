<?php

namespace App\Common\Transformer\Response\ViolationResponse;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationListInterface;

interface ViolationListResponseTransformerInterface
{
    /**
     * @param ConstraintViolationListInterface $violationList
     * @return Response
     */
    public function transform(ConstraintViolationListInterface $violationList): Response;
}
