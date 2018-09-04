<?php

namespace App\Common\Transformer\Request;

use Symfony\Component\HttpFoundation\Request;

interface RequestTransformerInterface
{
    /**
     * @param Request $request
     * @return object
     */
    public function transform(Request $request): object;
}
