<?php

namespace App\Common\Transformer\Response;

use Symfony\Component\HttpFoundation\Response;

interface ResponseTransformerInterface
{
    /**
     * @param object $dto
     * @return Response
     */
    public function transform(object $dto): Response;
}
