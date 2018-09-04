<?php

namespace App\Common\Transformer\Request\DataExtractor;

use Symfony\Component\HttpFoundation\Request;

interface DataExtractorInterface
{
    /**
     * @param Request $request
     * @return array
     */
    public function extract(Request $request): array;
}
