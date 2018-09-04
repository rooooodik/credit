<?php

namespace App\Common\Transformer\Response\Builder;

use Symfony\Component\HttpFoundation\Response;

interface ResponseBuilderInterface
{
    public function build(string $content): Response;
}
