<?php

namespace App\Common\Service;

interface ServiceInterface
{
    /**
     * @param object $dto
     * @return object
     */
    public function behave(object $dto): object;
}
