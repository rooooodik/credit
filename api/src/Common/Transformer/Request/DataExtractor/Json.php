<?php

namespace App\Common\Transformer\Request\DataExtractor;

use Symfony\Component\HttpFoundation\Request;

final class Json implements DataExtractorInterface
{
    /**
     * @inheritdoc
     */
    public function extract(Request $request): array
    {
        return json_decode($request->getContent(), true);
    }
}
