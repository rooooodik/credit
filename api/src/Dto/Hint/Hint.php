<?php

namespace App\Dto\Hint;

use JMS\Serializer\Annotation as Serializer;

class Hint
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $identifier;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $message;

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     * @return Hint
     */
    public function setIdentifier(string $identifier = null)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Hint
     */
    public function setMessage(string $message = null)
    {
        $this->message = $message;

        return $this;
    }
}
