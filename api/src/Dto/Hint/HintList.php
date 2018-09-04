<?php

namespace App\Dto\Hint;

use JMS\Serializer\Annotation as Serializer;

class HintList
{
    /**
     * @var array
     *
     * @Serializer\Type("array<App\Dto\Hint\Hint>")
     */
    private $hints;

    /**
     * @return array
     */
    public function getHints()
    {
        return $this->hints;
    }

    /**
     * @param array $hints
     * @return HintList
     */
    public function setHints(array $hints = [])
    {
        $this->hints = $hints;

        return $this;
    }
}
