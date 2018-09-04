<?php

namespace App\Common\Transformer\Request\Builder;

interface BuilderInterface
{
    /**
     * @param object $data
     * @return object
     */
    public function build($data): object;
}
